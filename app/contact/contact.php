<?php
	require_once dirname(__file__).'/../../lib/aobject.php';
	class contact extends AObject {
		public function __construct() {
			parent::__construct(__CLASS__);
		}
		public function quick_contact($lang) {
			$contact = dibi::query("select * from [contact_contacts] where [id]=1")->fetch();
			$this->get_translate($lang);
			return $this->parse("quick_contact.tpl", $contact);
		}
		
		public function contact_us($text_id, $lang) {
			$contact = dibi::query("select * from [contact_contacts] cc inner join [page_content] pc on [pc.id] = %i where [cc.id]=1", $text_id)->fetch();
			$this->get_translate($lang);
			return $this->parse("contact.tpl", $contact);
		}
	}
	
	class contact_model {
		public function contact_email($name, $email, $message, $phone) {
			echo "$name, $email, $message, $phone";
		}
	}
?>