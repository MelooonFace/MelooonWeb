<?php

	class Welcome extends Controller
	{
		
		function __construct()
		{
			parent::__construct();
						
			$this->output->append_output(
				$this->config->item("default_controller"));

		}
		
	}