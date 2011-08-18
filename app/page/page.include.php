<?php
	require_once 'page.php';
	require_once dirname(__file__).'./../../lib/controller.php';

	Presenter::view("page", array(
								"class"=>"page",
								"method"=>"show",
								"params"=>array('text_id'=>'%([0-9]+)')));
	Presenter::view("page", array(
								"class"=>"page",
								"method"=>"page_editor",
								"login"=>true));
	
	//model
	Presenter::method("page", array(
								"class"=>"page",
								"method"=>"page_content",
								"login"=>true,
								"params"=>array('text_id'=>'%([0-9]+)')));
	
	Presenter::method("page", array(
								"class"=>"page_model",
								"method"=>"update_content",
								"login"=>true,
								"params_array"=>true,
								"params"=>array(
									"text_id"=>'%([0-9]+)',
									"content_title"=>"%all",
									"page_content"=>"%all")));
?>