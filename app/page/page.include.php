<?php
	require_once 'page.php';
	require_once dirname(__file__).'./../../lib/controller.php';

	Presenter::view("page", array(
								"class"=>"page",
								"method"=>"show",
								"params"=>array('text_id'=>'%([0-9])')));
?>