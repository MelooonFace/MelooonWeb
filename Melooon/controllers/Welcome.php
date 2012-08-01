<?php

	class Welcome extends Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		
		public function index()
		{
						
			$this->output->append_output(
				$this->load->view('welcome.php'));
			
		}
		
	}