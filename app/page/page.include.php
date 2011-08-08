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
								"params"=>array()));
	Presenter::view("page", array(
								"class"=>"page",
								"method"=>"page_content",
								"params"=>array('text_id'=>'%([0-9]+)')));
	
	Presenter::view("page", array(
								"class"=>"page_model",
								"method"=>"update_content",
								"params_array"=>true,
								"params"=>array(
									"text_id"=>'%([0-9]+)',
									"content_title"=>"%all",
									"page_content"=>"%all")));
?>