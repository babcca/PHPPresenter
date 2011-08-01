<?php
	require_once dirname(__file__).'/language_loader.php';
	 
	class URLParser {
		// 0 - get|post 1 - /app/view/param1/.../?opt1=val&...
		private $url_type = 0;
		/**
		 * @return array(param=>value, ...)
		 * Enter description here ...
		 */
		public static function parse($keyword) {
			switch ($_SERVER['REQUEST_METHOD']) {
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
		private $running_application = array();
		private $callbacks_view = array();
		private $callbacks_method = array();
		public $post_refresh = true;
		public $use_default = false;
		public $error;
		public $warning;
		
		public function __construct() {
			$this->error = array();
			$this->warning = array();
		}
				
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
		
		public function call($app, $method, $params = array()) {
			ApplicationManager::instance()->import($app);
			$data = $this->callbacks_view[$app]->$method;
			if ($data == null) { throw new Exception("Address not found", 0); }
			//check_permision($data);
			return $this->call_method($data, $params);	
		}
		
		public function run_method() {
			$url = $_POST;
			ApplicationManager::instance()->import($url["app"]);
			$data = $this->callbacks_method[$url['app']]->$url['method'];
			if ($data == null) { throw new Exception("Address not found", 0); }
			$_SESSION["backup"][$url["app"]]["__return"] = $this->call_method($data, $url, $this->use_default);
			if ($this->post_refresh) header('location: '. $_SERVER['REQUEST_URI']);
		}
		
		public function run_view() {
			$url = URLParser::parse(NULL);
			ApplicationManager::instance()->import($url["app"]);
			$data = $this->callbacks_view[$url['app']]->$url['method'];
			if ($data == null) { 
					header("HTTP/1.0 404 Not Found");
					header("Location: /?app=index&method=error404");
					//throw new Exception("Address not found", 0);
			}
			//check_permision($data);
			//if (isset($_SESSION["backup"][$url["app"]])) 
			$this->call_method($data, $url, $this->use_default);
		}
		
		public function parse_extended($what, $where, $use_default) {
			$parameters = array();
			foreach ($what as $param=>$pattern) {
				if (!array_key_exists($param, $where)) {
					if (preg_match('#\[(\w+)\]$#', $pattern, $default)) { $parameters[$param] = $default[1]; }
						else { $this->error[] = array("parameter_expected", $aparam, 0); } 
					} else if (!$this->check_param($where[$param], $pattern)) {
						if ($use_default === true) {
							if (preg_match('#\[(\w+)\]$#', $pattern, $default)) {
									$parameters[$param] = $default[1];
							}
							else $this->error[] = array("parameter_format", $param, 0);
						} else { $this->error[] = array("parameter_format", $param, 0); }
					} else { $parameters[$param] = $where[$param]; }
			}
			return $parameters;
		}
		
		private function call_method($data, $url, $use_default = false) {
			$parameters = $this->parse_extended($data['params'], $url, $use_default);
			if(!isset($this->running_application["{$data['class']}"])) {
				//$app_info = ApplicationManager::instance()->get_application($url['app']);
				$this->running_application["{$data['class']}"] = array(
					//'app_data' => $app_info,
					'app_object' => new $data['class']
				);
				/*if ($app_info->is_get_data_enable())*/ 
			} 	
			return call_user_func_array(array(
				$this->running_application["{$data['class']}"]["app_object"],
				$data['method']), $parameters);
		}
	
		private function check_param($param, $pattern) {
			if (preg_match("&^%\{((\w+)((, ?\w+)*))\}&", $pattern, $enum)) {
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
		public function register_view($app, $callback) {
			if (!array_key_exists($app, $this->callbacks_view)) $this->callbacks_view[$app] = new callback_struct();
			$this->callbacks_view[$app]->insert($callback);
		}
		
		public function register_method($app, $callback) {
			if (!array_key_exists($app, $this->callbacks_method)) $this->callbacks_method[$app] = new callback_struct();
			$this->callbacks_method[$app]->insert($callback);
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
			self::$controller->register_view($app, $callback_struct);
		}
		public static function method($app, $callback_struct) {
			self::$controller->register_method($app, $callback_struct);	
		}
	}


?>