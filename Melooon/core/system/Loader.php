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
			// Get the classname from the file_path
			$class_name = basename($file_path);
			$class_name = ucfirst(strtolower($class_name));
			
			if(self::is_loaded( $class_name ))
				return self::$get_class( $class_name );
			
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
		
	}