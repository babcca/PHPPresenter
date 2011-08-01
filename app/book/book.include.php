<?php
	require_once 'book.php';
	require_once dirname(__file__).'/../../lib/controller.php';

	Presenter::view("book", array(
								"class"=>"book",
								"method"=>"book_form",
								"params"=>array()
								));
	Presenter::view("book", array(
								"class"=>"book_model",
								"method"=>"book_email",
								"params"=>array("date_from"=>"%(^[0-9]{2}-[0-9]{2}-[0-9]{4}$)",
												"date_to"=>"%(^[0-9]{2}-[0-9]{2}-[0-9]{4}$)",
												"guests"=>"%(^[0-9]+$)",
												"rooms"=>"%(^[0-9]+$)",
												"beds_s"=>"%(^[0-9]+$)",
												"beds_d"=>"%(^[0-9]+$)",
												"parking"=>"%(.*)",
												"transfer"=>"%(.*)",
												"time"=>"%(^[0-9]{1,2}:[0-9]{2}$)",
												"name"=>"%([^<>]+)",
												"email"=>"%(^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$)",
												"phone"=>"%(^\+?[0-9 ]*)[]",
												"message"=>"%(.*)")
								));
?>