<?php
	require_once dirname(__file__).'/index.php';
	require_once dirname(__file__).'/../../lib/controller.php';

	Presenter::view("index", array(
								"class"=>"index",
								"method"=>"clanek",
								"params"=>array("id"=>"%([a-z-.]+)[home]", "lang"=>"%{en,de}[en]"), // post parameters bhodne pro znovuvyplneni
								"url" => "index/clanek/id=%([a-z-.]+)[home]/?order=%{asc,desc}[asc]"));
	Presenter::view("index", array(
								"class"=>"index",
								"method"=>"admin",
								"params_array"=>true,
								"params"=>array("p1"=>"%([a-z-._]+)[page]", "p2"=>"%([a-z-._]+)[page_editor]"),
								));
?>