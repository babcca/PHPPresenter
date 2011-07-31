<?php
	require_once dirname(__file__).'/../../lib/aobject.php';
	class menu extends AObject {
		public function __construct() {
			parent::__construct(__CLASS__);
		}
		public function generate_menu($lang) {
			$data['menu'] = dibi::query("select * from [presenter] where [lang]=%s order by [position]", $lang)->fetchAll();
			return $this->parse("menu.tpl", $data);
		}
		public function generate_language_menu($id) {
			$data['lang_link'] = dibi::query('select uri, lang from [presenter] where [position] = (select position from [presenter] where [uri] = %s limit 1)', $id)->fetchAll();
			return $this->parse("language_menu.tpl", $data);
		}
		
	}
?>