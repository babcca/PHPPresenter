<?php
	require_once 'gallery.php';
	require_once dirname(__file__).'/../../lib/controller.php';

	Presenter::view("gallery", array(
								"class"=>"gallery",
								"method"=>"generate",
								"params"=>array("text_id"=>"%([0-9]+)")));
	
	Presenter::view("gallery", array(
								"class"=>"gallery",
								"login"=>true,
								"method"=>"gallery_editor"
								));
								
	Presenter::method("gallery", array(
								"class"=>"gallery_model",
								"method"=>"upload_image",
								"login"=>true,
								"params"=>array("new_image_desc"=>"%([^<>]*)")
								));
	Presenter::method("gallery", array(
								"class"=>"gallery_model",
								"method"=>"update_desc",
								"login"=>true,
								"params"=>array("image_id"=>"%([0-9]+)", "desc"=>"%([^<>]+)")
								));
	Presenter::method("gallery", array(
								"class"=>"gallery_model",
								"method"=>"delete_image",
								"login"=>true,
								"params"=>array("image_id"=>"%([0-9]+)")
								));
?>