<?php

	class Storage
	{
		// A storage class, where items are held
	}
	
	function &get_instance()
	{
		return Controller::get_instance();
	}
	
	function error_handler($level, $message, $file, $line, $context) {
		global $__error;
		
		if($level == E_STRICT)
			return;
		
		$__error->error_page("Fatal Error", $message . " in <b>{$file}</b> on line <b>{$line}</b>.");
	}
	
	function get_controller()
	{
		global $__uri, $__conf;
		return ( $__uri->segment(0) != null ) ? ucfirst(strtolower($__uri->segment(0))) : $__conf->item('default_controller');
	}
	
	function get_method()
	{
		global $__uri, $__conf;
		return ( $__uri->segment(1) != null ) ? strtolower($__uri->segment(1)) : $__conf->item('default_method');
	}
	
	// TODO rework
	function get_args()
	{
		global $__uri;
		$args = array();
		
		if($__uri->num_segments() < 3)
			return array();
		
		$segs = $__uri->segments();
		unset($segs[0], $segs[1]);
		
		foreach($segs as $seg)
		{
			array_push($args, $seg);
		}
		
		return $args;
	}
	
	function base_url()
	{
		global $__conf;
		return $__conf->item("base_url");
	}