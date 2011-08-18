<?php
	require_once 'book.php';
	require_once dirname(__file__).'/../../lib/controller.php';

	Presenter::view("book", array(
								"class"=>"book",
								"method"=>"book_form",
								"params"=>array('lang'=>'%([a-z]{2})', 'text_id'=>'%([0-9]+)')
								));
	Presenter::view("book", array(
								"class"=>"book",
								"method"=>"quick_book_form",
								"params"=>array('lang'=>'%([a-z]{2})')
								));
	Presenter::view("book", array(
								"class"=>"book",
								"method"=>"book_editor",
								"login"=>true
								));

								
	// methods
	Presenter::method('book', array(
								"class"=>"book_model",
								"method"=>"redirect",
								"params" => array("lang"=>'%([a-z]{2})',
												  "date_from_quick"=>"%([0-9]{2}-[0-9]{2}-[0-9]{4})[]",
												  "date_to_quick"=>"%([0-9]{2}-[0-9]{2}-[0-9]{4})[]",
												  "guests_quick"=>"%num")
								));
	Presenter::method('book', array(
								"class"=>"book_model",
								"method"=>"price_update",
								"login"=>true,
								"params_array"=>true,
								"params" => array("euro"=>"%([0-9]+)",
												  "parking"=>"%([0-9]+)",
												  "breakfast"=>"%([0-9]+)",
												  "transport"=>"%([0-9]+)",
												  "day_tax"=>"%all") // jak kontrolovat pole?
								));
						
	Presenter::method('book', array(
								"class"=>"book_model",
								"method"=>"calculate_price",
								"params_array"=>true,
								"params" => array("date_from"=>"%(^[0-9]{2}-[0-9]{2}-[0-9]{4}$)",
												  "date_to"=>"%(^[0-9]{2}-[0-9]{2}-[0-9]{4}$)",
												  "breakfast"=>"%{false,true}[false]",
												  "transfer"=>"%{true,false}[false]",
												  'rooms'=>"%all") // jak kontrolovat pole?
								));
	
								

	Presenter::method("book", array(
								"class"=>"book_model",
								"method"=>"book_order",
								"params_array"=>true,
								"params"=>array("date_from"=>"%(^[0-9]{2}-[0-9]{2}-[0-9]{4}$)",
												"date_to"=>"%(^[0-9]{2}-[0-9]{2}-[0-9]{4}$)",
												"arrival_time"=>"%([0-9]+)[0]",
												"breakfast"=>"%{false,true}[false]",
												"transfer"=>"%{true,false}[false]",
												"message"=>"%(.*)[]",	
												'rooms'=>"%all",
												"name"=>"%string",
												"email"=>"%(^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$)",
												"phone"=>"%(^\+?[0-9 ]+)[]"	
								)));
?>