<?php
	require_once dirname(__file__).'/../lib/controller.php';
	require_once dirname(__file__).'/../lib/application_manager.php';
	require_once dirname(__file__).'/../lib/render.php';
	require_once dirname(__file__).'/../lib/dibi/dibi.php';
	
	session_start();
	$app_manager = ApplicationManager::instance();
	$app_manager->register(new Application("book"));

	$controller = new Controller();
	$controller->post_refresh = false;
	Presenter::$controller = $controller;
	$controller->run();
	BQueue::dump('utf-8');
?>
	