<?php
//Todas as operações CRUD do sistema.

//----------------------------INSERT----------------------------
function inserirComprador($nome,$cpf,$rg,$nascimento){
	
	global $conn;
	
	$sql  = "INSERT INTO comprador ";
	$sql .= "(nome,cpf,rg,nascimento) ";
	$sql .= "VALUES ('$nome','$cpf','$rg','$nascimento') ";
	
	$Execute = mysqli_query($conn,$sql);
	
	if($Execute === false){
		echo 'error - ';
		echo mysqli_error($conn);
	}
	else{
		echo "SUCESS";
	}
}

function inserirEndereco($cep,$logradouro,$bairro,$cidade,$estado,$numero){
	
	global $conn;
	
	$last_id_comprador = selectLastIdComprador();
	$sql  = "INSERT INTO endereco ";   
	$sql .= "(idComprador,cep,logradouro,bairro,cidade,estado,numero) ";
	$sql .= "VALUES ($last_id_comprador,'$cep','$logradouro','$bairro','$cidade','$estado',$numero) ";
	
	$Execute = mysqli_query($conn,$sql);
	
	if($Execute === false){
		echo 'error - ';
		echo mysqli_error($conn);
	}
	else{
		//echo "SUCESS";
	}
}

//----------------------------UPDATE----------------------------

//----------------------------DELETE----------------------------

//----------------------------SELECT----------------------------
//Buscar ultimo id inserido
function selectLastIdComprador(){
	
	global $conn;
	
	$sql = "SELECT MAX(idComprador) AS last_id FROM comprador;";
	
	if ($result = mysqli_query($conn, $sql)) {

		$row = mysqli_fetch_assoc($result); 
        return $row["last_id"];
    }
}


?>