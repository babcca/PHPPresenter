<?php
	/**
	 * Application register struct
	 * @author Petr Babicka
	 */
	class Application {
		public $data = array();
		public $included = false;
		private $message_manager = true;
		/**
		 * @param String $app_name
		 * @param Array $depends
		 */
		public function __construct($app_name, $depends = array(), $messages = true) {
			$this->data["app"] = $app_name;
			$this->data["depends"] = $depends;
		}
		public function app() { return $this->data["app"]; }
		public function depends() { return $this->data["depends"]; }
	}
	/**
	 * Singleton class for managing application
	 * @author Petr Babicka
	 */
	class ApplicationManager {
		private $application_list = array(); /*< Associative array with application list (app. name is key) */
		private static $instance; /*< Static handler for object */
		private function __construct() {}
		private function __clone() {}
		/**
		 * Return singleton instance of class
		 */
		public static function instance() {
			if (!isset(self::$instance)) {
				$me = __CLASS__;
				self::$instance = new $me; 
			}
			return self::$instance;
		}
		/*
		 * Registrovani aplikace jako celku, je mozne nezavisle spoustet jednotlive aplikace
		 * v depends seznamu [NOW] (registrace jedne velke aplikace jako celku)
		 * Druha moznost spoustet jenom rucne registrovane aplikace a ty co jsou v depends listu
		 * jenom kdyz je spustena hlavni aplikace
		 */
		/**
		 * Register application into system
		 * @param Application $application_struct
		 */
		public function register(Application $application_struct) {
			foreach ($application_struct->depends() as $depend) {
				$this->register($depend);
			}
			if (!array_key_exists($application_struct->app(), $this->application_list)) {
				$this->application_list[$application_struct->app()] = $application_struct;
			} else {
				throw new Exception("Application already registred", 0);
			}
		}
		/**
		 * Import all necessary file for application
		 * @param $application_name
		 */
		public function import($application_name) {
			if (array_key_exists($application_name, $this->application_list)) {
				if ($this->application_list[$application_name]->included) return;
				foreach ($this->application_list[$application_name]->depends() as $import) {
					$this->import($import->app());
				}
				$this->application_list[$application_name]->included = true;
				require_once dirname(__file__).'/../app/'.$application_name.'/'.$application_name.'.include.php';
			} else {
				throw new Exception("Application $application_name not registred", 0);
			}
		}
	}
?>