<?php

	class Output
	{
		
		private $output;
		
		/**
		 * Doesnt do anything yet
		 */
		function __construct()
		{
			// Nothing yet :)
		}
		
		/**
		 * Gets the output at its current state
		 */
		public function get_output()
		{
			return $this->output;
		}
		
		/**
		 * Sets the entire output
		 */
		public function set_output($out)
		{
			$this->output = $out;
			
			return $this;
		}
		
		/**
		 * Appends a string of data to the output
		 */
		public function append_output($out)
		{
			$this->output .= $out;
			
			return $this;
		}
		
		/**
		 * Clears the current output
		 */
		public function clear_output()
		{
			return $this->set_output("");
		}
		
		/**
		 * TODO prints the final output out
		 */
		function __destruct()
		{
			echo $this->get_output();
		}
		
	}