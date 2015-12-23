<?php
private function code()
	{
		$characters = array(
			"1","2","3","4","5","6","7","8","9"
					);

		$keys = array();

		while(count($keys) < 11){
			$x = mt_rand(0, count($characters) - 1);
			if(!in_array($x, $keys)){
				$keys[]= $x;
			}
		}
		$random_chars ="";
		foreach($keys as $key){

			$random_chars .= $characters[$key];
		}

		return $random_chars;
	}