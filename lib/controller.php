<?php 
	require_once dirname(__file__).'/language_loader.php';
	require_once dirname(__file__).'/logger.php';
	
	class URLParser {
		private $url_type = 0;
		
		public static function parse($keyword) {
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'POST':
					return $_POST;
					break;
				case 'GET':
					return $_GET;
					break;
				default:
					//error
			}
		}
		
		public static function make_url($app, $method, $params, $bootstrap = 'index') {
			$url = "/$bootstrap.php?app=$app&method=$method";
			foreach ($params as $key => $val) {
				$url .= "&$key=$val";
			}
			return $url;	
		}
	}

	class Controller {
		private $callbacks = array();
		private $process_list = array();
		public $post_refresh = true;
		public $use_default = false;
		private $alowed_shortcut = array(
				'%num'=>'[0-9]+',
				'%string' => '[a-zA-Z ]+'
		);
		public function __construct() {
		}
		
		public function call($app, $method, $params = array()) {
			ApplicationManager::instance()->import($app);
			$data = $this->callbacks[$app]->$method;
			if ($data == null) { throw new Exception("Address not found", 0); }
			//check_permision($data);
			return $this->call_method($data, $params);	
		}
		
		
		public function run() {
			$url = URLParser::parse(NULL);
			$app = isset($url["app"]) ? $url["app"] : 'index';
			$method = isset($url['method']) ? $url['method'] : 'clanek';
			ApplicationManager::instance()->import($app);
			$data = $this->callbacks[$app]->$method;
			if ($data == null) { throw new Exception("Address not found", 0); }
			//check_permision($data);
			BQueue::push($this->call_method($data, $url, $this->use_default));
			if (($_SERVER['REQUEST_METHOD'] == 'POST') && $this->post_refresh) {
				header('location: '. $_SERVER['REQUEST_URI']); // vyresit nefunguje 100% :(
			}
		}
		
		public function parse_extended($what, $where, $use_default) {
			$parameters = array();
			foreach ($what as $param=>$pattern) {
				if (!array_key_exists($param, $where)) {
					if (preg_match('#\[(\w+)\]$#', $pattern, $default)) { $parameters[$param] = $default[1]; }
					else { throw new Exception("Expected parameter $param", 0); } 
				} else if (!$this->check_param($where[$param], $pattern)) {
					if ($use_default === true) {
						if (preg_match('#\[(\w+)\]$#', $pattern, $default)) { $parameters[$param] = $default[1]; }
						else throw new Exception("Bad parameter $param format", 0);
					} else { throw new Exception("Bad parameter $param format", 0); }
				} else { $parameters[$param] = $where[$param]; }
			}
			
			return $parameters;
		}
		
		private function call_method($data, $url, $use_default = false) {
			$parameters = $this->parse_extended($data['params'], $url, $use_default);
			if (isset($data['params_array']) && $data['params_array'] = true) {
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
			} else if (preg_match("&^%\{((\w+)((, ?\w+)*))\}&", $pattern, $enum)) {
				return array_search($param, explode(",", $enum[1])) !== false;
			} else if (preg_match("&^%<(.*)>&", $pattern, $fn)) {
				return $fn[1]($param) == true;
			} else if (preg_match("&^%\((.*)\)&", $pattern, $regexp)) {
				return preg_match("&^{$regexp[1]}$&", $param) == true;
			} else return false;
		}
		/**
		 * @param app = application_name
		 * @param Array $callback = array(
		 * 				"class" => <class name>
		 * 				"method" => <method name>
		 * 				"url" => array("clanek", "article"),
		 * 				"param"=>array("%<replace>", "%([[:alnum:]])", "%{yes, no}"[no]),
		 * 				"login" => True | False,
		 * 				"groups" => array("group1", ...)
		 */
		public function register_callback($app, $callback) {
			if (!array_key_exists($app, $this->callbacks)) $this->callbacks[$app] = new callback_struct();
			$this->callbacks[$app]->insert($callback);
		}
		
	}
	class callback_struct {
		private $_data = array();
		public function insert($value) {
				$url = $value['method'];
				if (!array_key_exists($url, $this->_data)) {
					$this->_data[$url] = $value;
				}
		}
		public function __get($key) {
			if (array_key_exists($key, $this->_data)) {
				return $this->_data[$key];
			} else {
				return null;
			}
		}
	}
	
	class Presenter {
		public static $controller;
		public static function view($app, $callback_struct) {
			self::$controller->register_callback($app, $callback_struct);
		}
	}


?>