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
	function removeAcentos($string) {
		$acentos = array(
        'À','Á','Ã','Â', 'à','á','ã','â',
        'Ê', 'É',
        'Í', 'í', 
        'Ó','Õ','Ô', 'ó', 'õ', 'ô',
        'Ú','Ü',
        'Ç', 'ç',
        'é','ê', 
        'ú','ü',
        );
		$remove_acentos = array(
        'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a',
        'e', 'e',
        'i', 'i',
        'o', 'o','o', 'o', 'o','o',
        'u', 'u',
        'c', 'c',
        'e', 'e',
        'u', 'u',
        );
		return str_replace($acentos, $remove_acentos, urldecode($string));
	}
?>