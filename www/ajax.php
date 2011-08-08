<?php
	require_once dirname(__file__).'/../lib/controller.php';
	require_once dirname(__file__).'/../lib/application_manager.php';
	require_once dirname(__file__).'/../lib/render.php';
	require_once dirname(__file__).'/../lib/dibi/dibi.php';
	
	session_start();
	dibi::connect(array(
		'driver'=>'mysql',
		'username'=> 'w6811_barbora',
		'password'=>'Kverty246',
		'host'=>($_SERVER['SERVER_NAME'] != 'apartments-barbora.com' ? 'localhost' : 'wm8.wedos.net'),
		'database'=>'d6811_barbora',
		'charset'=>'utf8'
	));
	$app_manager = ApplicationManager::instance();
	$app_manager->register(new Application("book"));
	$app_manager->register(new Application("page"));
	$app_manager->register(new Application("gallery"));

	$controller = new Controller();
	$controller->post_refresh = false;
	Presenter::$controller = $controller;
	$controller->run();
	BQueue::dump('utf-8');
?>
	