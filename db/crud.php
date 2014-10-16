<?php
//Todas as operações CRUD do sistema.

//----------------------------INSERT----------------------------
function inserirComprador($nome,$cpf,$rg,$nascimento){
	
	global $conn;
	
	$sql  = "INSERT INTO comprador ";
	$sql .= "(nome,cpf,rg,nascimento) ";
	$sql .= "VALUES ('$nome','$cpf','$rg','$nascimento');";
	
	$Execute = mysqli_query($conn,$sql);
	
	if($Execute === false){
		echo 'error - ';
		echo mysqli_error($conn);
	}
	else{
		//echo "SUCESS";
	}
}

function inserirEndereco($cep,$logradouro,$bairro,$cidade,$estado,$numero){
	
	global $conn;
	
	$last_id_comprador = selectLastIdComprador();
	$sql  = "INSERT INTO endereco ";   
	$sql .= "(idComprador,cep,logradouro,bairro,cidade,estado,numero) ";
	$sql .= "VALUES ($last_id_comprador,'$cep','$logradouro','$bairro','$cidade','$estado',$numero);";
	
	$Execute = mysqli_query($conn,$sql);
	
	if($Execute === false){
		echo 'error - ';
		echo mysqli_error($conn);
	}
	else{
		//echo "SUCESS";
	}
}

function inserirUsuario($login,$senha){
	
	global $conn;
	
	$password = md5($senha);
	$last_id_comprador = selectLastIdComprador();
	$sql  = "INSERT INTO usuario ";
	$sql .= "(idComprador,login,senha) ";
	$sql .= "VALUES ($last_id_comprador,'$login','$password');";
	
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

function atualizarComprador($idComprador,$nome,$cpf,$rg,$nascimento){
	
	global $conn;
	
	$sql  = "UPDATE comprador ";
	$sql .= "SET nome 			= '$nome'";
	$sql .= "SET cpf  			= '$cpf' ";
	$sql .= "SET rg   			= '$rg'  ";
	$sql .= "SET nascimento   	= '$nascimento' ";
	$sql .= "WHERE idComprador 	=  $idComprador; ";
	
	$Execute = mysqli_query($conn,$sql);
	
	if($Execute === false){
		echo 'error - ';
		echo mysqli_error($conn);
	}

}

function atualizarEndereco($idComprador,$cep,$logradouro,$bairro,$cidade,$estado,$numero){
	
	global $conn;
	
	$sql  = "UPDATE endereco ";
	$sql .= "SET cep 			= '$cep'          ";
	$sql .= "SET logradouro  	= '$logradouro'   ";
	$sql .= "SET bairro   		= '$bairro'       ";
	$sql .= "SET cidade   		= '$cidade'       ";
	$sql .= "SET estado 		= '$estado'       ";
	$sql .= "SET numero 		=  $numero        ";
	$sql .= "WHERE idComprador 	=  $idComprador;  ";
	
	$Execute = mysqli_query($conn,$sql);
	
	if($Execute === false){
		echo 'error - ';
		echo mysqli_error($conn);
	}
}

function atualizarUsuario($idComprador,$login){

	global $conn;
	
	$sql  = "UPDATE usuario ";
	$sql .= "SET login         = '$login' ";
	$sql .= "WHERE idComprador =  $idComprador; ";
	
	$Execute = mysqli_query($conn,$sql);
	
	if($Execute === false){
		echo 'error - ';
		echo mysqli_error($conn);
	}
}
//--------------------------------------------------------------






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

//Verifica a validade do login

function loginValidation($email,$senha){
	
	global $conn;
	
	//codificando a senha para comparação
	$password = md5($senha);
	
	$sql  = "SELECT * FROM usuario ";
	$sql .= "WHERE login = '$email' ";
	$sql .= "AND   senha = '$password'; ";
	
	if ($result = mysqli_query($conn, $sql)) {
		$row_cnt = mysqli_num_rows($result);
		//Caso a busca retorne exatamente uma linha. Como consequência existe o usuário selecionado no BD
		if($row_cnt == 1){
		
			//iniciando a sessão
			session_start();
			
			$_SESSION["time"] =  date('d/m/Y H:i:s');
			
			$row = mysqli_fetch_assoc($result);
			
			//Se o id do comprador na tabela de usuário for null,então o usuário é administrador
			if($row["idComprador"] == null){
				$_SESSION["usuario"] = "admin";
				$_SESSION["email_admin"] = $row["login"];
			}
			//Caso contrário o usuário é um comprador
			else{
				$_SESSION["usuario"] = "comprador";
				$_SESSION["idComprador"] = $row["idComprador"];
			}
			//Login realizado com sucesso
			return true;
		}
		else{
			//Login falhou
			return false;
		}
	}
}

//Busca um comprador por id

function selectCompradorById($idComprador){
	
	global $conn;
	
	$sql   = "SELECT a.*,b.*,c.login ";
	$sql  .= "FROM comprador a ";
	$sql  .= "INNER JOIN endereco b ON  (a.idComprador = b.idComprador) ";
	$sql  .= "INNER JOIN usuario c ON (a.idComprador = c.idComprador) ";
	$sql  .= "WHERE a.idComprador = '$idComprador'; ";
	
	if ($result = mysqli_query($conn, $sql)) {
		
		$row = mysqli_fetch_assoc($result);
		
		return $row;
	}
	else{
		die('Invalid query: ' . mysql_error());
	}
}

//--------------------------------------------------------------

?>