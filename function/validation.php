<?php
	function isFormValido($campos){
		
		$isValido = true;
		
		foreach($campos as $campo){
			if(trim($campo) == ""){
				$isValido = false;
			}
		}	
		return $isValido;
	}
?>