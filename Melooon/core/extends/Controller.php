<?php

	class Controller
	{
		
		private static $instance;
		
		function __construct()
		{
			self::$instance =& $this;
			
			foreach(Loader::get_loaded() as $info)
			{
				$this->$info =& Loader::load_class( $info );
			}
		}
		
		public function &get_instance()
		{
			return self::$instance;
		}
		
	}