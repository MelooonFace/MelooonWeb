<?php

	class Config
	{
		
		public $config = array();
		
		function __construct()
		{
			// Load the default config + the custom edited config
			$this->load("defaults.php;config.php");
		}
		
		/**
		 * Get a config item
		 */
		public function item()
		{
			$args = func_get_args();
			
			$ret = $this->config;
			foreach($args as $arg)
			{
				$ret = $ret[$arg];
			}
			
			return $ret;
		}
		
		/**
		 * Loads a (or array of) php config file(s) (requires a .php extention)
		 */
		function load($file_path = null)
		{
			global $__output;
			
			if(!is_array($file_path) && strpos($file_path, ";") != FALSE)
				$file_path = explode(";", $file_path);
		
			if(is_array($file_path))
			{
				foreach($file_path as $file)
				{
					$this->load($file);
				}
				return;
			}
		
			$full_file_path = APP_PATH. 'config/' .$file_path;
			
			if(file_exists( $full_file_path ))
			{
				require_once( $full_file_path );
				
				if(isset($config))
				{
					foreach($config as $item => $value)
					{
						$this->config[$item] = $value;
					}
				}
				
				else
				{
					// Best not to throw this error, sometimes we just want to use the defaults
					// chuck_error("Error", "Config could not be loaded, config file <b>{$full_file_path}</b> had no config items");
				}
			}
			
			else
			{
				chuck_error("Error", "Config could not be loaded, config file <b>{$full_file_path}</b> was not found");
			}
		}
		
	}