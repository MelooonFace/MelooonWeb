<?php

	class Uri
	{
		
		private $segments = array();
		
		function __construct()
		{		
			if(isset($_SERVER["argv"][0]))
			{
				$ex = explode("/", $_SERVER["argv"][0]);
				foreach($ex as $item)
				{
					array_push($this->segments, $item);
				}
			}
		}
		
		public function segment($index = 0)
		{
			if(isset($this->segments[$index]))
				return $this->segments[$index];
			else
				return null;
		}
		
		public function segments()
		{
			return $this->segments;
		}
		
		public function num_segments()
		{
			return count($this->segments);
		}
		
	}