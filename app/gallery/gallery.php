<?php
	require_once dirname(__file__).'/../../lib/aobject.php';
	class gallery extends AObject {
		public function __construct() {
			parent::__construct(__CLASS__);
		}
		public function generate($text_id) {
			$img = dibi::query("select * from [gallery] inner join [page_content] pc on [pc.id] = %i", $text_id)->fetchAll();
			return $this->parse('gallery.tpl', array("images" => $img));
		}
	}
?>