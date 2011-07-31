<?php
	require_once 'gallery.php';
	require_once dirname(__file__).'/../../lib/controller.php';

	Presenter::view("gallery", array(
								"class"=>"gallery",
								"method"=>"generate",
								"params"=>array("text_id"=>"%([0-9]+)")));
?>