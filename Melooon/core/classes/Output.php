<?php

	class Output
	{
		
		private $output;
		
		function __construct()
		{
			// Nothing yet :)
		}
		
		public function get_output()
		{
			return $this->output;
		}
		
		public function set_output($out)
		{
			$this->output = $out;
			
			return $this;
		}
		
		public function append_output($out)
		{
			$this->output .= $out;
			
			return $this;
		}
		
		public function clear_output()
		{
			return $this->set_output("");
		}
		
		function __destruct()
		{
			echo $this->get_output();
		}
		
	}