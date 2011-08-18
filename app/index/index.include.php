<?php
	require_once dirname(__file__).'/index.php';
	require_once dirname(__file__).'/../../lib/controller.php';

	Presenter::view("index", array(
								"class"=>"index",
								"method"=>"clanek",
								"params"=>array("id"=>"%([a-z-.]+)[home]", "lang"=>"%{en,de}[en]") 
							));
	Presenter::view("index", array(
								"class"=>"index",
								"method"=>"admin",
								"login"=>true,
								"params_array"=>true,
								"params"=>array("p1"=>"%([a-z-._]+)[page]", "p2"=>"%([a-z-._]+)[page_editor]")
							));
	Presenter::view("index", array(
								"class"=>"index",
								"method"=>"index_editor",
								"login"=>true
							));
	Presenter::method("index", array(
								"class"=>"index_model",
								"method"=>"get_data",
								"login"=>true,
								"params"=>array("page_id"=>"%([0-9]+)")
							));
	Presenter::method("index", array(
								"class"=>"index_model",
								"method"=>"index_update_data",
								"login"=>true,
								"params_array"=>true,
								"params"=>array("id"=>"%([0-9]+)", "page_title"=>"%all", "uri"=>"%([a-z-_]+)", "description"=>"%all")
							));
?>