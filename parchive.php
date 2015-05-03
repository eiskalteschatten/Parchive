<?php
	define(INDEX_DIR, __DIR__);
	
	require_once('lib/simplehtmldom_1_5/simple_html_dom.php');
	require_once('config.php');
	require_once('src/helper.php');	
	require_once('src/archive.php');
	
	/*
		Argument 0: File name
		Argument 1: URL of the website to be parsed
		Argument 2: Directory where the archive should be saved
	*/
	
	//print_r($argv);
	
	if (sizeof($argv) < 3) {
		Helper::echoWithSpaces("Please enter a valid URL for parsing and a save location.");
		exit();
	}
	
	$archive = new Archive($argv);
	$archive->startArchivalProcess();
?>