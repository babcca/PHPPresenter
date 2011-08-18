<?php
	require_once 'auth.php';
	require_once dirname(__file__).'/../../lib/controller.php';

	Presenter::view("auth", array(
								"class"=>"auth",
								"method"=>"login",
								"params"=>array("uri"=>"%(/\?[A-Za-z0-9-_=&]+)[/?app=index&method=admin]")
	));

	Presenter::method("auth", array(
								"class"=>"auth_model",
								"method"=>"login",
								"params"=>array("email"=>"%(([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4}))",
												"password"=>"%all")
								));
	Presenter::method("auth", array(
								"class"=>"auth_model",
								"method"=>"logout",
								"login"=>true
								));
								
	Presenter::method("auth", array("class"=>"auth_model","method"=>"is_logged"));
?>