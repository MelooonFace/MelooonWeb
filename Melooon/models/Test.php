<?php

	class Test extends Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		
		public function do_something()
		{
			// Temporary example
			$this->_get('output')->set_output("LOL!");
		}
		
	}