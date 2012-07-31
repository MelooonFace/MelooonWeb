<?php

	class Loader
	{
		
		private static $classes = array();
		private static $loaded = array();
		
		function __construct()
		{
			// Nothing yet :)
		}
		
		/**
		 * Loads and initializes a class from app/core/classes
		 *
		 * $file_path needs to not contain a file extention,
		 * however it can be multidimensional.
		 *
		 * If class has been loaded previously, it will return
		 * the instance of the class.
		 */
		public function &load_class($file_path = null)
		{
			$class_name = basename($file_path);
			$class_name = ucfirst(strtolower($class_name));
			
			if(self::is_loaded( $class_name ))
				return self::get_class( $class_name );
			
			if(file_exists( APP_PATH. 'core/classes/' .$file_path. '.php' ))
			{
				require_once( APP_PATH. 'core/classes/' .$file_path. '.php' );
				
				if(class_exists( $class_name ))
				{
					array_push( self::$loaded, $file_path );
					
					self::$classes[$class_name] = new $class_name;
					return self::$classes[$class_name];
				}
			}
		}
		
		/**
		 * Returns a pre-defined class stored in the $classes array (static)
		 */
		public function &get_class($class_name)
		{
			return self::$classes[$class_name];
		}
		
		/**
		 * Gets a list of all the previously loaded classes (static)
		 */
		public function &get_loaded()
		{
			return self::$loaded;
		}
		
		/**
		 * Returns true or false, based on if a class has already been loaded
		 */
		public function is_loaded($class_name)
		{
			return (in_array( $class_name, self::$loaded ));
		}
		
		/**
		 * Loads the extends into the instance
		 */
		public function load_extends()
		{
			$files = glob(APP_PATH. "core/extends/*.php");
			foreach($files as $file)
			{
				require_once($file); // Require only once, we know what they're used for
				// Do nothing, we dont want to init the classes, they are only used for extendin
			}
		}
		
		public function load_controller($file_path)
		{
			global $__output;
			
			$file_path = str_replace(".php", "", $file_path);
			$full_file_path = APP_PATH. 'controllers/' .$file_path. '.php';
			
			$class_name = ucfirst(strtolower(basename($file_path)));
			
			if(file_exists( $full_file_path ))
			{
				require_once( $full_file_path );
				
				if(class_exists( $class_name ))
				{
					$m = new $class_name();
					
					if(!($m instanceof Controller))
					{
						chuck_error("Warning", "Controller <b>$class_name</b> is not an instance of Controller");
					}
					
					return $m;
				}
				
				else
				{
					chuck_error("Error", "Controller could not be loaded, class <b>{$class_name}</b> was not found");
				}
			}
			
			else
			{
				chuck_error("Error", "Controller could not be loaded, controller file <b>{$full_file_path}</b> was not found");
			}
		}
		
		public function call_method($method = null, $args = null)
		{
			global $__output;
			$m =& get_instance();
			
			if($method == null)
				$method = get_method();
			
			if($args == null)
				$args = get_args();
				
			if(method_exists( $m, "__route" ))
			{
				$method = "__route";
			}
			
			if(method_exists( $m, $method ))
			{
				call_user_func_array(array($m, $method), $args);
			}
			
			else
			{
				chuck_error("Error", "Method could not be called, method <b>{$method}</b> was not found in Controller <b>" .get_controller(). "</b>,");
				return;
			}
		}
		
	}