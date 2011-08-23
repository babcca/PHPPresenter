<?php
	/**
	* Ajax entry point, connect to databse and run controller with registred apps
	*/
	require_once dirname(__file__).'/../lib/controller.php';
	require_once dirname(__file__).'/../lib/application_manager.php';
	require_once dirname(__file__).'/../lib/render.php';
	require_once dirname(__file__).'/../lib/dibi/dibi.php';

	session_start();
	dibi::connect(array(
		'driver'=>'mysql',
		'username'=> 'w1_albatros',
		'password'=>'ahoj',
		'host'=> 'localhost',
		'database'=>'c1_albatros',
		'charset'=>'utf8'
	));
	
	$app_manager = ApplicationManager::instance();
	$app_manager->register(new Application("form", array(new Application('auth'))));
	$controller = new Controller();
	$controller->post_refresh = false;
	Presenter::$controller = $controller;
	$controller->run();
	BQueue::dump('utf-8');
?>
	