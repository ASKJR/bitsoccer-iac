<?php
	function UserDate($dbDate){
		//Formatando data para formato brasileiro 2014-10-22 -> 22/10/2014
		$UserDate = explode("-",$dbDate);
		return $UserDate[2]."/".$UserDate[1]."/".$UserDate[0];
	}
	function TimeUser($dbTime){
		//Formatando horas. 19:12:55 -> 19:12
		$dbTime[5]="";
		$dbTime[6]="";
		$dbTime[7]="";
		$TimeUser=$dbTime;
		return $TimeUser;
	}
?>