<?php
	
	if(!defined( 'APP_PATH' ))
		exit("Launcher must be loaded from another file!");

	/**
	 * Require the loader class, so we can start loading some pre-controller classes
	 */
	require_once(APP_PATH. 'core/system/'. 'Loader.php');
	require_once(APP_PATH. 'core/system/'. 'Common.php');
	
	// Init the loader
	new Loader();
	
	// Load the extend classes
	Loader::load_extends();
	
	// Load the output class first, just incase some pre-controller classes have something to say
	$__output =& Loader::load_class("Output");
	
	// Create an instance of the config class
	$__conf =& Loader::load_class("Config");
	
	// Load the uri class
	$__uri =& Loader::load_class("Uri");
	
	// Then load the 'Load' class to get ready for in-controller loads
	$__load =& Loader::load_class("Load");
	
	$__load->view("test.html");
	
	$__load->model("Test");
	
	$__load->model->test->do_something();
	
	Loader::load_controller("Welcome");