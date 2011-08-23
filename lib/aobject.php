<?php
	require_once dirname(__file__).'/render.php';
	/**
	 * Zakladni objekt pro aplikace, jsou potomkem tridy Render.
	 * @author Petr Babicka
	 *
	 */
	class AObject extends BRender {
		public function __construct($app) {
			parent::__construct($app);
		}
		
		public function send_data($dest, $data, $source) {
			//if (isset($_SESSION[$dest])) {
				$_SESSION[$dest]= array($source, $data);
			//} else {
			//	throw new Exception("SECURITY: Sending data to $dest is disable", 1);
			//}
		}
			
		public function get_data($id) {
				if (!isset($_SESSION[$id])) return NULL;
				$data = $_SESSION[$id];
				unset($_SESSION[$id]);
				return $data;
				
		}
		
		/**
		 * Ulozi do session data pod identifikatorem,
		 * jeden identifikator muze mit vice polozek.
		 * @param mixed $message Data k ulozeni
		 * @param string $id Identifikator pro pristup
		 */
		public function set_message($message, $id = '') {
				$_SESSION['__bab_messages'][$id][] = $message;
		}
		public function set_title($title) {}
	}

?>