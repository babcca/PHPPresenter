<?php
	require_once dirname(__file__).'/../../lib/aobject.php';
	class index extends AObject {
		public function __construct() {
			parent::__construct(__CLASS__);
		}
		public function clanek($id, $lang) {
			$page = dibi::query('select * from [presenter] WHERE [uri] = %s and [lang] = %s', $id, $lang)->fetch();
			$page['select_id'] = $id;
			$this->get_translate($lang);
			$this->write('index.tpl', $page);
		}
		
		public function admin($apps) {	
			$this->write('admin.tpl', $apps);
		}
	}
?>