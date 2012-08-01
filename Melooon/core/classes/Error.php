<?php

	class Error
	{
		
		function __construct()
		{
			// Nothing yet
		}
		
		public function error_page($header = "System Error", $message = "Unknown message!")
		{
			global $__output;
			
			$data = array(
				"header" => $header,
				"message" => $message
			);
			
			$__output->set_output( $this->_error("page", $data) );
			die();
		}
		
		public function error_404()
		{
			global $__output, $__uri;
			
			$data = array(
				"request" => base_url(). implode("/", $__uri->segments())
			);
			
			header("HTTP/1.0 404 Not Found");
			header("Status: 404 Not Found"); 
			$__output->set_output( $this->_error("404", $data) );
			die();
		}
		
		private function _error($error = "404", $data = array())
		{
			global $__load;
			return $__load->view("errors/error_" .$error. ".php", $data, true);
		}
		
	}