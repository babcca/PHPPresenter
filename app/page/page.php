<?php
	require_once dirname(__file__).'./../../lib/aobject.php';
	
	class page extends AObject {
		public function __construct() {
			parent::__construct(__CLASS__);
			
		}
		public function show($text_id) {
			$content = dibi::query('select * from [page_content] where [id]=%i', $text_id)->fetch();
			return $this->parse('content.tpl', $content);
		}
	}
?>