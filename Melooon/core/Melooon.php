<?php
	
	if(!defined( 'APP_PATH' ))
		exit("Launcher must be loaded from another file!");

	/**
	 * Require the loader class, so we can start loading some pre-controller classes
	 */
	require_once(APP_PATH. 'core/system/'. 'Loader.php');
	
	// Init the loader
	new Loader();
	
	// Load the output class first, just incase some pre-controller classes have something to say
	$__output =& Loader::load_class("Output");
	
	// Then load the 'Load' class to get ready for in-controller loads
	$__load =& Loader::load_class("Load");
	
	$__load->view("test.html");