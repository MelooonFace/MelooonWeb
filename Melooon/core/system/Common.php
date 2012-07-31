<?php

	class Storage
	{
		// A storage class, where items are held
	}
	
	function &get_instance()
	{
		return Controller::get_instance();
	}
	
	function chuck_error($type = "Error", $message = "Unknown error")
	{
		global $__output;
		$call = debug_backtrace();
		$__output->append_output("<br />\n<b{$type}:</b> {$message} in <b>" .$call[1]['file']. "</b> on <b>line " .$call[1]['line']. "</b>.");
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