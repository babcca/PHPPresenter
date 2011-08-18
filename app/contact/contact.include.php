<?php
	require_once 'contact.php';
	require_once dirname(__file__).'/../../lib/controller.php';

	Presenter::view("contact", array(
								"class"=>"contact",
								"method"=>"quick_contact",
								"params"=>array("lang"=>"%(.*)")));
	
	Presenter::view("contact", array(
								"class"=>"contact",
								"method"=>"contact_us",
								"params"=>array("text_id"=>"%num", "lang"=>"%(.*)")));
	
	Presenter::view("contact", array(
								"class"=>"contact",
								"login"=>true,
								"method"=>"contact_editor"));
	
	Presenter::method("contact", array(
								"class"=>"contact_model",
								"method"=>"contact_email",
								"params"=>array("name"=>"%([^<>]+)",
												"email"=>"%(([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4}))",
												"message"=>"%all",
												"phone"=>"%(^\+?[0-9 ]*)[]")
								));
									
	Presenter::method("contact", array(
								"class"=>"contact_model",
								"method"=>"contact_update",
								"login"=>true,
								"params"=>array("contact_table"=>"%all")));
?>