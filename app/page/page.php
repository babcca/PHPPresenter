<?php
	require_once dirname(__file__).'./../../lib/aobject.php';
	
	class page extends AObject {
		private $page_model;
		public function __construct() {
			parent::__construct(__CLASS__);
			$this->page_model = new page_model();
			
		}
		public function show($text_id) {
			$content = dibi::query('select * from [page_content] where [id]=%i', $text_id)->fetch();
			return $this->parse('content.tpl', $content);
		}
		
		public function page_editor() {
			$data["pages"] = dibi::query("select param, concat(menu_title, ' | ', lang) from [presenter] order by [position]")->fetchPairs();
			return $this->parse('page_editor.tpl', $data);
		}
		
		public function page_content($text_id) {
			return json_encode($this->page_model->get_content($text_id));
		}
	}
	
	class page_model extends AObject {
		private $cache = array();
		public function __construct() {
			parent::__construct('page');
		}
		public function get_content($text_id) {
			if (!isset($this->cache["content"])) {
				$this->cache["content"] = dibi::query('select * from [page_content] where [id]=%i', $text_id)->fetch();
			}
			return $this->cache["content"];
		}
		public function update_content($content) {
			dibi::query('UPDATE [page_content] SET [title] = %s, [text] = %s WHERE [id] = %i LIMIT 1', $content["content_title"], $content["page_content"], $content["text_id"]);
			$this->set_message('Obsah "'.$content["content_title"].'" byl aktualizovan', 'page_editor');
			return "{{'info': 'ahojky'}}";
		}
	}
?>