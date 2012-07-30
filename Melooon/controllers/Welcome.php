<?php

	class Welcome extends Controller
	{
		
		function __construct()
		{
			parent::__construct();
			
			var_dump($this);
			
			$this->output->append_output(
				$this->config->item("default_controller"));
			
			// var_dump($this);
		}
		
	}