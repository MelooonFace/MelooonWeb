<?php

	class Config
	{
		
		public $config = array();
		
		function __construct()
		{
			// Load the default config + the custom edited config
			$this->load("defaults.php;config.php");
						
			if($this->item("base_url") == null)
			{
				if (isset($_SERVER['HTTP_HOST']))
				{
					$base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
					$base_url .= '://'. $_SERVER['HTTP_HOST'];
					$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
				}
	
				else
				{
					$base_url = 'http://localhost/';
				}
	
				$this->set('base_url', $base_url);
			}
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
				if(isset($ret[$arg]))
					$ret = $ret[$arg];
			}
			
			if($ret == $this->config)
				$ret = null;
			
			return $ret;
		}
		
		/**
		 * Set a config item
		 */
		public function set($item, $value)
		{
			$this->config[$item] = $value;
			
			return $this;
		}
		
		/**
		 * Loads a (or array of) php config file(s) (requires a .php extention)
		 */
		function load($file_path = null)
		{
			global $__output, $__error;
			
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
				$__error->error_page("Config Error", "Config could not be loaded, file not found.");
			}
		}
		
	}