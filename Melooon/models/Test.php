<?php

	class Test extends Model
	{
		
		public function do_something()
		{
			// Temporary example
			global $__output;
			
			$__output->append_output("Hey from <b>Test</b> model!");
		}
		
	}