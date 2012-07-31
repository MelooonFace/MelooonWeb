<?php

	class Model
	{
	
		function __construct()
		{
			// Nothing yet :)
		}
		
		public function _get($sub)
		{
			$m =& get_instance();
			return $m->$sub;
		}
		
	}