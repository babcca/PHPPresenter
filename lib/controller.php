<?php 
	require_once dirname(__file__).'/language_loader.php';
	require_once dirname(__file__).'/logger.php';
	
	class Controller {
		private $callbacks_view = array(); /**< Registrovane pohledy */
		private $callbacks_method = array(); /**< Registrovane metody */
		private $process_list = array(); /**< Seznam bezicich apliakci (vytvorenych instanci */
		public $post_refresh = true; /**< Refresh po POST pozadavku */
		public $use_default = false; /**< Pokud neni vyplnen argument, ma se pouzit defaultni*/
		private $alowed_shortcut = array( /**< Podporovane zkratky pro regexpres */
				'%num'=>'[0-9]+',
				'%string' => '[a-zA-Z ]+'
		);
		
		public function __construct() {
		}
		
		/**
		 * Vstupni bod konrolery, podle typu pozadavku se rozhoduje, 
		 * ma-li volat pohledy nebop metody.
		 */
		public function run() {
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'GET':
					$this->run_view();
					break;
				case 'POST':
					$this->run_method();
					break;
				default:
					break;
			}
		}
		/**
		 * Zjednudusene volani pohledu z aplikaci pro smarty plugin,
		 * kontroluje se zda ma uzivatel pravo volat dany pohled, pokud
		 * ne tak bude presmerovan na prihlasovaci stranku.
		 * @param string $app Nazev registrovane aplikace
		 * @param string $method Nazev volane metody (pohledu)
		 * @param array $params Paramatery pro dany pohled
		 * @throws Exception Vyjimka pro nenalezenou aplikaci
		 * @return Vystup z volane aplikace
		 */
		public function call($app, $method, $params = array()) {
			ApplicationManager::instance()->import($app);
			$data = $this->callbacks_view[$app]->$method;
			if ($data == null) { 
				$data = $this->callbacks_method[$app]->$method;
				if ($data == null) { throw new Exception("Application $app not found", 0); }
			}
			if (!$this->check_permision($data)) {
				header('Location: /?app=auth&method=login&uri='.urlencode($_SERVER['REQUEST_URI']));
				exit;
			}
			return $this->call_method($data, $params);	
		}	
		
		/**
		 * Plnohodnotene volani aplikaci s paramety a kontrolou pristupu k dane metode
		 * Ulozi do fronty vystup z volane aplikace
		 * @param array $url = (app, method, <parametry>
		 * @param string $source = callbacks_view | callbacks_method
		 * @param string $dapp defaultni aplikace
		 * @param string $dmethod defaultni metoda
		 */
		private function process($url, $source, $dapp = 'default', $dmethod = 'default') {
			$app = isset($url["app"]) ? $url["app"] : $dapp;
			$method = isset($url['method']) ? $url['method'] : $dmethod;
			ApplicationManager::instance()->import($app);
			$src = $this->$source;
			$data = $src[$app]->$method;
			if ($data == null) {
					header("HTTP/1.0 404 Not Found");
					exit;
			}
			if (!$this->check_permision($data)) {
				header('Location: /?app=auth&method=login&uri='.urlencode($_SERVER['REQUEST_URI']));
				exit;
			}
			BQueue::push($this->call_method($data, $url, $this->use_default));
		}
		
		/**
		 * Volani pohledu z $_GET pozadavku
		 */
		private function run_view() {
			$this->process($_GET, 'callbacks_view', 'index', 'clanek');
		}
		
		/**
		 * Volani metody z $_POST pozadavku
		 * Je-li nastaven post_refresh pak po provedeni dojde k
		 * obnove stranky, zamezeni znovu odesilani dat.
		 */
		private function run_method() {
			$this->process($_POST, 'callbacks_method');
			if ($this->post_refresh) {
				header('location: '. $_SERVER['REQUEST_URI']);
				exit;
			}
		}
		
		/**
		 * Kontrola ma-li uzivatel pravo volat danou aplikaci
		 * Prenechano na aplikaci auth
		 * @param string $app Jmeno aplikace
		 * @return bool true ma-li uzivatel pravo, jinak false
		 */
		private function check_permision($app) {
			if ($app['login'] === false) return true;
			return $this->call('auth', 'is_logged');
		}
		
		/**
		 * Parsovani rozsireneho zadavani typu parametru
		 * @param array $what('parametr'=>vzor)
		 * @param array $where('parametr'=>'hodnota') vstupni pole ke kontrole
		 * @param bool $use_default nebude-li parametr nalezen ma se pouzit defaultni hodnota
		 * @throws Exception Spatny format parametru nebo parametr nebyl nalezen
		 * @return array Pole parametru ('parametr'=>'hodnota')
		 */
		private function parse_extended($what, $where, $use_default) {
			$parameters = array();
			foreach ($what as $param=>$pattern) {
				if (!array_key_exists($param, $where)) {
					if (preg_match('#\[([\w?=&/]+)\]$#', $pattern, $default)) { $parameters[$param] = $default[1]; }
					else { throw new Exception("Expected parameter $param", 0); } 
				} else if (!$this->check_param($where[$param], $pattern)) {
					if ($use_default === true) {
						if (preg_match('#\[([\w?=&/]+)\]$#', $pattern, $default)) { $parameters[$param] = $default[1]; }
						else throw new Exception("Bad parameter $param format", 0);
					} else { throw new Exception("Bad parameter $param format", 0); }
				} else { $parameters[$param] = $where[$param]; }
			}
			
			return $parameters;
		}
		
		/**
		 * Vola metodu z dane tridy, vytvari se pozue jedna instance
		 * teto tridy po celou dobu behu scriptu.
		 * @param callback_struct $data Data aplikace
		 * @param array $url Vstupni pole argumentu
		 * @param bool $use_default = false
		 * @return mixed
		 */
		private function call_method($data, $url, $use_default = false) {
			$parameters = $this->parse_extended($data['params'], $url, $use_default);
			if ($data['params_array'] === true) {
				$parameters = array($parameters);
			}
			if (!isset($this->process_list[$data['class']])) {
				$this->process_list[$data['class']] = new $data['class'];
			}
			return call_user_func_array(array($this->process_list[$data['class']], $data['method']), $parameters);
		}
		
		
		/**
		 * Return true when $param is validate by $pattern
		 *  
		 * @param string $param Checked string
		 * @param pattern_type $pattern 
		 * Awayble $pattaren:
		 * 		%(regexp) => check by regexpresion
		 * 		%<function> => check by function
		 * 		%{enum,value} => check if $param is in enumeration
		 * Shorcuts of $pattern:
		 * 		%all => match with every input
		 * 		%num => match with positove numbers
		 * @return true when match is found otherwise false
		 */
		private function check_param($param, $pattern) {
			if (strstr($pattern, '%all')) return true;
			else if (array_key_exists($pattern, $this->alowed_shortcut)) {
				return preg_match("&^{$this->alowed_shortcut[$pattern]}&", $param) == true;
			} else if (preg_match("&^%\{((\w+)((,\w+)*))\}&", $pattern, $enum)) {
				return array_search($param, explode(",", $enum[1])) !== false;
			} else if (preg_match("&^%<(.*)>&", $pattern, $fn)) {
				return $fn[1]($param) == true;
			} else if (preg_match("&^%\((.*)\)&", $pattern, $regexp)) {
				return preg_match("#^{$regexp[1]}$#", $param) == true;
			} else return false;
		}

		/**
		 * Registrace pohledovych casti aplikace
		 * @param string $app Nazev apliakce
		 * @param callback_struct $callback Struktura s nastavenim volane metody
		 */
		public function register_view($app, $callback) {
			if (!array_key_exists($app, $this->callbacks_view)) $this->callbacks_view[$app] = new callback_struct($callback);
			else $this->callbacks_view[$app]->insert($callback);
		}
		/**
		* Registrace metodovych casti aplikace
		* @param string $app Nazev apliakce
		* @param callback_struct $callback Struktura s nastavenim volane metody
		*/
		public function register_method($app, $callback) {
			if (!array_key_exists($app, $this->callbacks_method)) $this->callbacks_method[$app] = new callback_struct($callback);
			else $this->callbacks_method[$app]->insert($callback);
		}
	}
	/**
	 * Struktura pro udrzovani nastaveni jednotlivych metod,
	 * kazda plikace ma vlastni.
	 * @author Petr Babicka
	 *
	 */
	class callback_struct {
		private $data = array();
		public function __construct($value) {
			$this->insert($value);
		}
		/**
		 * Spoji defaultni hodnoty se zadanymi
		 *
		 * @param array $value Uzivatelske hodnoty
		 * @return Vyplnenou datovou strukturu
		 */
		private function merge($value) {
			$default = array(
				"class"=>"",
				"method"=>"",
				"params"=>array(),
				"params_array"=>false,
				"login" => false,
				"groups"=>array()
			);
			foreach($value as $key => $v) {
				$default[$key] = $v;
			}
			return $default;		
		}
		
		/**
		 * Vlozeni uzivatelskeho nastaveni do struktury, provadi se mergovani
		 * @param array $value Uzivatelske hodnoty
		 * @throws Exception Pokud nebyli vyplneny povinne parametry
		 */
		public function insert($value) {
				if (!isset($value['class']) || !isset($value["method"])) {
					throw new Exception("'class' and 'method' must be set", 0);
				}
				if (!array_key_exists($value['method'], $this->data)) { // toto upravit na pretezovani
					$this->data[$value['method']] = $this->merge($value);;
				}
		}
		/**
		 * Vyhleda nastaveni podle nazvu metody
		 * 
		 * @param string $key Nazev hledane motody
		 * @return data nebo null
		 */
		public function __get($key) {
			if (array_key_exists($key, $this->data)) {
				return $this->data[$key];
			} else {
				return null;
			}
		}
	}
	
	/**
	 * Rozhrani slouzici pro pridavane metod a pohledu do kontroleru
	 * @author Petr Babicka
	 *
	 */
	class Presenter {
		public static $controller; /**< Instance kontroleru */
		/**
		* Registrace pohledovych casti aplikace
		* @param string $app Nazev apliakce
		* @param callback_struct $callback Struktura s nastavenim volane metody
		*/
		public static function view($app, $callback_struct) {
			self::$controller->register_view($app, $callback_struct);
		}
		/**
		* Registrace metodovych casti aplikace
		* @param string $app Nazev apliakce
		* @param callback_struct $callback Struktura s nastavenim volane metody
		*/
		public static function method($app, $callback_struct) {
			self::$controller->register_method($app, $callback_struct);
		}
	}


?>