<?php
	require_once 'gallery.php';
	require_once dirname(__file__).'/../../lib/controller.php';

	Presenter::view("gallery", array(
								"class"=>"gallery",
								"method"=>"generate",
								"params"=>array("text_id"=>"%([0-9]+)")));
	
	Presenter::view("gallery", array(
								"class"=>"gallery",
								"method"=>"gallery_editor",
								"params"=>array()
								));
								
	Presenter::view("gallery", array(
								"class"=>"gallery_model",
								"method"=>"upload_image",
								"params"=>array("new_image_desc"=>"%([^<>]+)")
								));
	Presenter::view("gallery", array(
								"class"=>"gallery_model",
								"method"=>"update_desc",
								"params"=>array("image_id"=>"%([0-9]+)", "desc"=>"%([^<>]+)")
								));
	Presenter::view("gallery", array(
								"class"=>"gallery_model",
								"method"=>"delete_image",
								"params"=>array("image_id"=>"%([0-9]+)")
								));
?>