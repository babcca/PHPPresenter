<?php
	require_once dirname(__file__).'/../../lib/aobject.php';
	class index extends AObject {
		public function __construct() {
			parent::__construct(__CLASS__);
		}
		public function clanek($id, $lang) {
			$page = dibi::query('select * from [presenter] WHERE [uri] = %s and [lang] = %s', $id, $lang)->fetch();
			if ($page === false) {
				header("HTTP/1.0 404 Not Found");
				$this->write('404.tpl');
				return;
			}
			$page['select_id'] = $id;
			$this->get_translate($lang);
			$this->write('index.tpl', $page);
		}
		
		public function admin($apps) {	
			$this->write('admin.tpl', $apps);
		}
		
		public function index_editor() {	
			$this->assign('pages', dibi::query('select id,concat(menu_title, " | ", lang) from [presenter] order by [position]')->fetchPairs());
			return $this->parse('index_editor.tpl');
		}
	}
	
	class index_model extends AObject {
		public function __construct() {
			parent::__construct('index');
		}
		public function get_data($id) {
			$data = dibi::query('select id, page_title, uri, description from [presenter] where id = %i', $id)->fetch();
			return json_encode($data);
		}
		public function index_update_data($data) {
			$db_data = array_slice($data, 1);
			dibi::query('update [presenter] set', $db_data, 'where [id]=%i limit 1', $data['id']);
			$this->set_message("Data byla aktualizovana", 'index_editor');
		}
	}
?>