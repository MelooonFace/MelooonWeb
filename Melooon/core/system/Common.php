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