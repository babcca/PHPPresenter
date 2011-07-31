<?php
	require_once dirname(__file__).'/index.php';
	require_once dirname(__file__).'/../../lib/controller.php';

	Presenter::view("index", array("class"=>"index", "method"=>"error404", "params"=>array(), "url" => "index/error404/"));
	Presenter::view("index", array(
								"class"=>"index",
								"method"=>"clanek",
								"params"=>array("id"=>"%([a-z-.]+)[home]", "lang"=>"%{en,de}[en]"), // post parameters bhodne pro znovuvyplneni
								"url" => "index/clanek/%{en,de}[en]/%([a-z-.]+)[home]/?order=%{asc,desc}[asc]"));
	
?>