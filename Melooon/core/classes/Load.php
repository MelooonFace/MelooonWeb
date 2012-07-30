<?php

	class Load
	{
	
		public $model; // The place where the models are located
		
		function __construct()
		{
			$this->model = new Storage();
		}
		
		/**
		 * Loads a view into the output
		 */
		public function view($file_path, $args = array(), $return = false)
		{
			global $__output;
		
			$full_file_path = APP_PATH. 'views/' .$file_path;
		
			if(file_exists( $full_file_path ))
			{
				ob_start();
				extract($args);
				
				include $full_file_path;
				
				$content = ob_get_contents();
				ob_end_clean();
				
				if($return == true)
					return $content;
				
				$__output->append_output($content);
			}
			
			else
			{
				$debug = debug_backtrace();
				$__output->append_output("<b>Error:</b> View could not be loaded, view file <b>{$full_file_path}</b> was not found! View requested in <b>" .$debug[0]['file']. "</b> at <b>line " .$debug[0]['line']. "</b>.");
			}
		}
		
		/**
		 * Loads a model into the Load class
		 */
		public function model($file_path, $custom_name = null)
		{
			$file_path = str_replace(".php", "", $file_path);
			$full_file_path = APP_PATH. 'models/' .$file_path. '.php';
			
			$model_name = ucfirst(strtolower(basename($file_path)));
			
			if(isset( $this->model->$model_name ))
				return $this->model->$model_name;
			
			if(file_exists( $full_file_path ))
			{
				require_once($full_file_path);
				
				if(class_exists($model_name))
				{
					$this_name = ($custom_name == null) ? strtolower($model_name) : $custom_name;
					$this->model->$this_name = new $model_name();
					
					if(!($this->model->$this_name instanceof Model))
					{
						$__output->append_output("<b>Warning:</b> Model <b>$model_name</b> is not an instance of Model.");
					}
					
					return $this->model->$this_name;
				}
				
				else 
				{
					$debug = debug_backtrace();
					$__output->append_output("<b>Error:</b> Model could not be loaded, class <b>$model_name</b> not found! Model requested in <b>" .$debug[0]['file']. "</b> at <b>line " .$debug[0]['line']. "</b>.");
				}
			}
			
			else 
			{
				$debug = debug_backtrace();
				$__output->append_output("<b>Error:</b> Model could not be loaded, view file <b>{$full_file_path}</b> was not found! Model requested in <b>" .$debug[0]['file']. "</b> at <b>line " .$debug[0]['line']. "</b>.");
			}
		}
		
	}
	
	class Load_Model
	{
		// A place to hold the models
	}