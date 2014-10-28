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

function inserirTime ($selecao, $bandeira){
	global $conn;
	//proximo id
	$last_id_time = selectLastIdTime() + 1;
	
	//verifica se o time ja foi cadastrado
	$query = "select * from time ";
	$query .= "WHERE selecao = '".$selecao."'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_row($result);
	//se row for verdadeiro, o time ja esta cadastrado
	
	if (!$row) {
		$sql  = "INSERT INTO time ";
		$sql .= "(idTime, selecao, bandeira) VALUES ";
		$sql .= "(".$last_id_time.",'".$selecao."','".$bandeira."');";

		if (mysqli_query($conn, $sql)) {
			echo "<script type=text/javascript>
					alert ('O Time foi cadastrado com sucesso!!');
					history.back (-1);
				</script>";
		}
		else echo mysqli_error($conn);
	
	}
	else {
		echo "<script type=text/javascript>
				alert ('O Time ja está cadastrado!!');
				history.back (-1);
			</script>";
	}
}


//INSERE O JOGO NO BD E FAZ AS VERIFICAÇÕES NECESSARIAS
function inserirJogo ($tim1_id, $tim2_id, $data, $horario, $local, $maxIng){
	global $conn;
	//VERIFICA SE O JOGO JA FOI CADASTRADO
	$query = "SELECT * FROM jogo ";
	$query .= "WHERE idTime1=".$tim1_id." AND idTime2=".$tim2_id.";";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_row($result);
	//se $row for diferente de false, o jogo ja está cadastrado!!
	if(!$row) {
	
		$sql = "INSERT INTO jogo ";
		$sql .= "(idTime1, idTime2, local, data, horario, maxIngresso) VALUES ";
		$sql .= "(".$tim1_id.",".$tim2_id.",'".$local."','".$data."','".$horario."',".$maxIng.");";
	
		if ($tim1_id == $tim2_id) {
					echo "<script type=text/javascript>
							alert ('Times Iguais selecionados');
							history.back(-1);
						</script>";
					}
		else {			
			if (mysqli_query($conn, $sql)) {
				echo "<script type=text/javascript>
						alert ('O Jogo foi cadastrado com sucesso!!');
						history.back (-1);
					</script>";
			}
			else echo mysqli_error($conn);
		}	
	}
	else {
		echo "<script type=text/javascript>
				alert ('O jogo informado ja está cadastrado!!!');
				history.back (-1);
			</script>";
	}
}

/*function inserirCompradorJogo($idComprador,$idJogo){

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
*/







//----------------------------UPDATE----------------------------

function atualizarComprador($idComprador,$nome,$cpf,$rg,$nascimento){
	
	global $conn;
	
	$sql  = "UPDATE comprador ";
	$sql .= "SET ";
		$sql .= "nome 				= '$nome',       ";
	$sql .= "cpf  				= '$cpf',        ";
	$sql .= "rg   				= '$rg',         ";
	$sql .= "nascimento   		= '$nascimento'  ";
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
	$sql .= "SET ";
	$sql .= "cep 				= '$cep',          ";
	$sql .= "logradouro  		= '$logradouro',   ";
	$sql .= "bairro   			= '$bairro',       ";
	$sql .= "cidade   			= '$cidade',       ";
	$sql .= "estado 			= '$estado',       ";
	$sql .= "numero 			=  $numero         ";
	$sql .= "WHERE idComprador 	=  $idComprador;   ";
	
	$Execute = mysqli_query($conn,$sql);
	
	if($Execute === false){
		echo 'error - ';
		echo mysqli_error($conn);
	}
}

function atualizarUsuario($idComprador,$login){

	global $conn;
	
	$sql  = "UPDATE usuario ";
	$sql .= "SET ";
	$sql .= "login             = '$login' ";
	$sql .= "WHERE idComprador =  $idComprador; ";
	
	$Execute = mysqli_query($conn,$sql);
	
	if($Execute === false){
		echo 'error - ';
		echo mysqli_error($conn);
	}
}
//--------------------------------------------------------------






//----------------------------DELETE----------------------------


function deleteCompradorById($idComprador){
	
	global $conn;
	
	$sql  = "DELETE FROM comprador ";
	$sql .= "WHERE idComprador =  $idComprador; ";
	
	$Execute = mysqli_query($conn,$sql);
	
	if($Execute === false){
		echo 'error - ';
		echo mysqli_error($conn);
	}
}




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

function selectLastIdTime(){
	
	global $conn;
	
	$sql = "SELECT MAX(idTime) AS last_id FROM time;";
	
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
		echo 'error - ';
		echo mysqli_error($conn);
	}
}

function selectJogos(){
	
	global $conn;
	
	$sql  = "SELECT j.*, ";
	$sql .= "time1.selecao AS selecao1,time1.bandeira AS bandeira1, ";
	$sql .= "time2.selecao AS selecao2, time2.bandeira AS bandeira2 ";
	$sql .= "FROM jogo j "; 												
	$sql .= "INNER JOIN time time1 ON (j.idTime1 = time1.idTime)  ";  
	$sql .= "INNER JOIN time time2 ON (j.idTime2 = time2.idTime); ";
	
	if ($result = mysqli_query($conn, $sql)) {

		while ($row = mysqli_fetch_array($result)) {
			$rows[]= $row;
		}
			mysqli_free_result($result);
			return $rows;
	}
	else{
		echo 'error - ';
		echo mysqli_error($conn);
	}
}
//--------------------------------------------------------------

//-------------------------AJAX---------------------------------
function ajaxComprador($termo){
	
	global $conn;
	
	
	$sql   = "SELECT * FROM comprador where nome like '%".$termo."%' order by nome  ";
	$json=array();
	
	if ($result = mysqli_query($conn, $sql)) {
		
		while($comprador = mysqli_fetch_assoc($result)){
			$json[]=array(
                   'value'=> $comprador["nome"],
                   'label'=> $comprador["nome"],
				   'id'   => $comprador["idComprador"]
			);
		}
	}
	echo json_encode($json);
}

//--------------------------------------------------------------
?>