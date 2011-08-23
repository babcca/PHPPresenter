<?php
	require_once dirname(__file__).'/../../lib/controller.php';
	require_once dirname(__file__).'/../../lib/aobject.php';
	require_once dirname(__file__).'/form.php';
	
	Presenter::view('form', array("class"=>"form","method"=>"new_form","login"=>true));
	
	Presenter::view('form', array("class"=>"form_autocomplete","method"=>"client_list", "params"=>array("term"=>"%([\w ]+)"), "login"=>true));
	Presenter::method('form', array("class"=>"form_autocomplete","method"=>"get_products_list", "params"=>array("t_id"=>"%([0-9]+)", "i_id"=>"%([0-9]+)"), "login"=>true));
	
	Presenter::method('form', array(
										"class"=>"form_model",
										"method"=>"save_form",
										"login"=>true,
										"params_array"=>true,
										"params"=>array(
											"client_id"=>"%([0-9])",
											"client"=>"%all",
										)));
?>