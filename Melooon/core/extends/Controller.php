<?php

	class Controller
	{
		
		private static $instance;
		
		function __construct()
		{
			self::$instance =& $this;
		}
		
		public function &get_instance()
		{
			return self::$instance;
		}
		
	}