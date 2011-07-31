<?php
	require_once dirname(__file__).'/../../lib/aobject.php';
	class book extends AObject {
		public function __construct() {
			parent::__construct(__CLASS__);
		}
		
		public function book_form() {
			//$contact = dibi::query("select * from [contact_contacts] cc inner join [page_content] pc on [pc.id] = %i where [cc.id]=1", $text_id)->fetch();
			//$this->get_translate($lang);
			return $this->parse("book.tpl");
		}
	}
	
	class book_model {
		public function book_email() {
		
		}
	}
?>