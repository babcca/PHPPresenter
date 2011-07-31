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
		public function set_title($title) {}
	}

?>