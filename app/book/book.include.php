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
								"params"=>array()
								));
?>