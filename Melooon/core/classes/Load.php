<?php

	class Load
	{
	
		public static $models = array();
		
		function __construct()
		{
			// Nothing yet :)
		}
		
		/**
		 *
		 */
		public function view($file_path, $args = array(), $return = false)
		{
			if(file_exists( APP_PATH. 'views/' .$file_path ))
			{
				ob_start();
				extract($args);
				
				include APP_PATH. 'views/' .$file_path;
				
				$content = ob_get_contents();
				ob_end_clean();
				
				if($return == true)
					return $content;
				
				$output = Loader::get_class("Output");
				$output->append_output($content);
			}
		}
		
	}