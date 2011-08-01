<?php
	require_once dirname(__file__).'/render.php';
	/**
	 * Zakladni objekt pro aplikace, jsou potomkem tridy Render,
	 * udrzuji si odkaz na pripojeni do db, existuje-li nejake.
	 * @author Petr Babicka
	 *
	 */
	class AObject extends BRender {
		protected $db;
		public function __construct($app) {
			parent::__construct($app);
		}
		public function send_data_to_app($source, $dest, $data) {
			if (isset($_SESSION[$dest])) {
				$_SESSION[$dest][] = array($source, $data);
			} else {
				throw new Exception("SECURITY: Sending data to $dest is disable", 1);
			}
		}
		public function get_data($w) {
				return $_SESSION[$w];
			
		}

		public function set_title($title) {}
	}

?>