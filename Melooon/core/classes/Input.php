<?php

	class Input
	{
	
		// Create the variables
		public $post = array();
		public $get = array();
		public $file = array();
		
		/**
		 * Sets all the variables if they are set
		 */
		function __construct()
		{
			if(isset( $_POST ))
			{
				$this->post = $_POST;
			}
			
			if(isset( $_GET ))
			{
				$this->get = $_GET;
			}
			
			if(isset( $_FILE ))
			{
				$this->file = $_FILE;
			}
		}
		
		/**
		 * Returns the $_POST element
		 */
		public function post()
		{
			return $this->post;
		}
		
		/**
		 * Returns the $_GET element
		 */
		public function get()
		{
			return $this->get;
		}
		
		/**
		 * Returns the $_FILE element
		 */
		public function file()
		{
			return $this->file;
		}
		
	}