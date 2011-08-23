<?php 
	/**
	* Main boostrap, connect to databse and run controller with registred apps
	*/
	require_once dirname(__file__).'/../lib/controller.php';
	require_once dirname(__file__).'/../lib/application_manager.php';
	require_once dirname(__file__).'/../lib/render.php';
	require_once dirname(__file__).'/../lib/dibi/dibi.php';
	define("DEBUG_MODE", 1);

	require_once dirname(__file__).'/../lib/aobject.php';
	dibi::connect(array(
		'driver'=>'mysql',
		'username'=> 'w1_albatros',
		'password'=>'ahoj',
		'host'=> 'localhost',
		'database'=>'c1_albatros',
		'charset'=>'utf8'
	));
	session_start();
	$app_manager = ApplicationManager::instance();
	$app_manager->register(new Application("index", array(new Application("auth"), new Application("page"), new Application("menu"),  new Application("form"))));

	$controller = new Controller();
	Presenter::$controller = $controller;
	$controller->run();
	BQueue::dump('utf-8');
?>