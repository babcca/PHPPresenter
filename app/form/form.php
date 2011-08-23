<?php
	 class form extends AObject {
	 	public function __construct() {
	 		parent::__construct(__CLASS__);
	 	}
	 	public function new_form() {
	 		
	 		$data["products"] = dibi::query('select * from [fa_typy_produktu]')->fetchPairs();
	 		$data["insurences"] = dibi::query('select * from [fa_pojistovna]')->fetchPairs();
	 		$data['product'] = dibi::query('select text, nazev from [fa_produkt] where [pojistovna]= %i and [typ_produktu] = %i',1,1)->fetchPairs();
	 		return $this->parse('form.tpl', $data);	
	 	}
	 }
	 
	 class form_model extends AObject {
	 	public function __construct() {
	 		parent::__construct('form');
	 	}
	 	public function save_form($form) {
	 		var_dump($_POST);
	 		var_dump($form);
	 	}
	 }
	 
	 class form_autocomplete extends AObject {
	 	public function __construct() {
	 			parent::__construct('form');
	 	}
	 	
	 	public function client_list($term) {
	 		log::l($term);
	 		$clients = dibi::query('select concat(name, " | ", rc, " ", ico) as label, name as value, id, address, rc, ico from fa_clients where [poradce_id] = %i and [name] like %~like~ limit 15', $_SESSION['__bab_login_id'], $term)->fetchAll();
	 		return json_encode($clients);
	 	}
	 	
	 	public function get_products_list($type_id, $insurence_id) {
	 		$products = dibi::query('select nazev, text from [fa_produkt] where [pojistovna]= %i and [typ_produktu] = %i', $insurence_id, $type_id)->fetchPairs();
	 		return json_encode($products);
	 	}
	 }
?>