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
	
	$query2 = "SELECT * FROM jogo ";
	$query2 .= "WHERE idTime1=".$tim2_id." AND idTime2=".$tim1_id.";";
	$result = mysqli_query($conn, $query2);
	$row2 = mysqli_fetch_row($result);
	//se $row for diferente de false, o jogo ja está cadastrado!!
	if(!$row && !$row2) {
	
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

function inserirCompradorJogo($idComprador,$idJogo){

	global $conn;
	
	if(!isSorteado($idComprador)){
		if(!isCompradorJogoMaximo($idComprador)){
			if(!isCompradorJogoRepetido($idComprador,$idJogo)){
			
				$sql  = "INSERT INTO comprador_jogo ";
				$sql .= "(idComprador,idJogo) ";
				$sql .= "VALUES ($idComprador,$idJogo);";
				
				$Execute = mysqli_query($conn,$sql);
				
				if($Execute === false){
					echo 'error - ';
					echo mysqli_error($conn);
				}
				else{
					echo "<script type=text/javascript>
					alert ('Parabéns.Você está concorrendo ao jogo selecionado!');
					history.back(-1);
					</script>";
				}
			}
			else{
				echo "<script type=text/javascript>
					alert ('Você já está concorrendo a esse jogo! Tente outro jogo.');
					history.back(-1);
					</script>";
			
			}
		}
		else{
			echo "<script type=text/javascript>
					alert ('Você já está concorrendo ao número máximo de jogos. Só é permitido 3 jogos por comprador!');
					history.back(-1);
					</script>";
			
		}
	}
	else{
		echo "<script type=text/javascript>
					alert ('Você já foi sorteado(a)!');
					history.back(-1);
					</script>";
	}
}

function inserirSorteio($idJogo,$idComprador){
	
	global $conn;
	
	$sql  = "INSERT INTO sorteio ";
	$sql .= "(idJogo,idComprador) ";
	$sql .= "VALUES ($idJogo,$idComprador); ";
	
	$Execute = mysqli_query($conn,$sql);
	
	if($Execute === false){
		echo 'error - ';
		echo mysqli_error($conn);
	}
	else{
		//echo Smth.
	}
}

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
	}
		echo mysqli_error($conn);

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

function resetaSenha ($idUsuario){
	global $conn;
	
	$sql = "UPDATE usuario SET senha=md5('123456') ";
	$sql .="WHERE idUsuario=".$idUsuario;
	
	$Execute = mysqli_query($conn,$sql);
	
	if($Execute === false){
		echo 'error - ';
		echo mysqli_error($conn);
	}
	else echo "
		<script type=text/javascript>
			alert ('Senha redefinida para padrão 123456');
		</script>";
	
}	

function atualizarStatusJogo($idJogo){
	
	global $conn;
	
	$is_sorteado=true;
	
	$sql  = "UPDATE jogo ";
	$sql .= "SET ";
	$sql .= "is_sorteado 	= $is_sorteado ";
	$sql .= "WHERE idJogo 	= $idJogo; ";
	
	$Execute = mysqli_query($conn,$sql);
	
	if($Execute === false){
		echo 'error - ';
		echo mysqli_error($conn);
	}
}

function alteraJogo ($idJogo, $data, $horario, $local, $maxIngresso) {
	global $conn;
	
	$sql  = "UPDATE jogo set data='".$data."', horario='".$horario;
	$sql .= "', local='".$local."', maxIngresso='".$maxIngresso."' ";
	$sql .= "WHERE idJogo=".$idJogo;
	
	$Execute = mysqli_query($conn,$sql);
	
	if($Execute === false){
		echo 'error - ';
		echo mysqli_error($conn);
	}
	else echo "
		<script type=text/javascript>
			alert ('Jogo alterado com sucesso!!');
			window.location.href = 'adminPesquisa.php';
		</script>";

}

function alteraTime ($idTime, $selecao, $bandeira) {
	global $conn;
	
	$sql  = "UPDATE time set selecao='".$selecao."', bandeira='".$bandeira;
	$sql .= "' WHERE idTime=".$idTime;
	$exec = mysqli_query($conn,$sql);
	if ($exec === false){
		echo "
		<script type=text/javascript>
			alert ('O jogo não pode ser alterado');
			window.location.href = 'adminPesquisa.php';
		</script>";
	}
	else {
		echo "
		<script type=text/javascript>
			alert ('O jogo foi alterado com sucesso!!');
			window.location.href = 'adminPesquisa.php';
		</script>";
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

function deleteCompradorJogoById($idCompradorJogo){
	
	
	global $conn;
	
	$sql  = "DELETE FROM comprador_jogo ";
	$sql .= "WHERE idCompradorJogo =  $idCompradorJogo; ";
	
	$Execute = mysqli_query($conn,$sql);
	
	if($Execute === false){
		echo 'error - ';
		echo mysqli_error($conn);
	}
	else{
		echo "<script type=text/javascript>
			alert ('Jogo deletado com sucesso!');
			window.location.href = 'adminPesquisa.php';
			</script>";
	}

}

function deleteJogo ( $id) {
	global $conn;
	$sql  = "DELETE from jogo ";
	$sql .= "WHERE idJogo =".$id;
	
	if (mysqli_query($conn, $sql)){
		echo "<script type=text/javascript>
				alert ('Jogo deletado com sucesso!');
				window.location.href = 'adminPesquisa.php';
			</script>";
			}
	else {
		echo "<script type=text/javascript>
				alert ('O jogo nao pode ser excluido pois ja possui clientes concorrendo');
				window.location.href = 'adminPesquisa.php';
			</script>";
	}
}

function deleteTime ($id) {
	global $conn;
	$sql  = "DELETE from time ";
	$sql .= "WHERE idTime =".$id;
	
	if (mysqli_query($conn, $sql)){
		echo "<script type=text/javascript>
				alert ('Time deletado com sucesso!');
				window.location.href = adminHome.php';
			</script>";
			}
	else {
		echo "<script type=text/javascript>
				alert ('O Time nao pode ser excluido pois ja esta cadastrado em algum jogo');
				window.location.href = 'adminHome.php';
			</script>";
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
	
	$sql   = "SELECT a.*,b.*,c.login, c.idUsuario ";
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



function selectJogosByComprador($idComprador){
	
	global $conn;
	
	$sql  = "SELECT c_j.*,j.*, ";
	$sql .= "time1.selecao AS selecao1,time1.bandeira AS bandeira1, ";
	$sql .= "time2.selecao AS selecao2, time2.bandeira AS bandeira2 ";
	$sql .= "FROM comprador_jogo  c_j ";
	$sql .= "INNER JOIN jogo j ON (c_j.idJogo = j.idJogo) ";
	$sql .= "INNER JOIN time time1 ON (j.idTime1 = time1.idTime)  ";  
	$sql .= "INNER JOIN time time2 ON (j.idTime2 = time2.idTime) ";
	$sql .= "WHERE c_j.idComprador =$idComprador; "; 
	
	if ($result = mysqli_query($conn, $sql)) {
		$rows = null;
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

function selectJogosSorteadosByComprador($idComprador){
	
	global $conn;
	
	$sql  = "SELECT sort.*,j.*, ";
	$sql .= "time1.selecao AS selecao1,time1.bandeira AS bandeira1, ";
	$sql .= "time2.selecao AS selecao2, time2.bandeira AS bandeira2 ";
	$sql .= "FROM sorteio  sort ";
	$sql .= "INNER JOIN jogo j ON (sort.idJogo = j.idJogo) ";
	$sql .= "INNER JOIN time time1 ON (j.idTime1 = time1.idTime)  ";  
	$sql .= "INNER JOIN time time2 ON (j.idTime2 = time2.idTime) ";
	$sql .= "WHERE sort.idComprador =$idComprador ";
	
	if ($result = mysqli_query($conn, $sql)) {

		$row = mysqli_fetch_array($result);
		mysqli_free_result($result);
		return $row;
	}
	else{
		echo 'error - ';
		echo mysqli_error($conn);
	}
}

function geraComprovante($idComprador){
	
	global $conn;
	
	$sql  = "SELECT sort.*,j.*,comp.*, ";
	$sql .= "time1.selecao AS selecao1,time1.bandeira AS bandeira1, ";
	$sql .= "time2.selecao AS selecao2, time2.bandeira AS bandeira2 ";
	$sql .= "FROM sorteio  sort ";
	$sql .= "INNER JOIN jogo j ON (sort.idJogo = j.idJogo) ";
	$sql .= "INNER JOIN comprador comp ON (sort.idComprador = comp.idComprador) ";
	$sql .= "INNER JOIN time time1 ON (j.idTime1 = time1.idTime)  ";  
	$sql .= "INNER JOIN time time2 ON (j.idTime2 = time2.idTime) ";
	$sql .= "WHERE sort.idComprador =$idComprador ";
	
	if ($result = mysqli_query($conn, $sql)) {

		$row = mysqli_fetch_array($result);
		mysqli_free_result($result);
		return $row;
	}
	else{
		echo 'error - ';
		echo mysqli_error($conn);
	}
}

function isCompradorJogoRepetido($idComprador,$idJogo){
	
	global $conn;
	
	//Verificar se um comprador já está concorrendo a um jogo.Não deixar 
	//selecionar o mesmo jogo 2 vezes
	$sql  = "SELECT * FROM comprador_jogo ";
	$sql .= "WHERE idComprador = '$idComprador' ";
	$sql .= "AND   idJogo      = '$idJogo'; ";
	
	if ($result = mysqli_query($conn, $sql)) {
		$row_cnt = mysqli_num_rows($result);
		if($row_cnt == 1){
			return true;
		}
		else
			return false;
	}
	else{
		echo 'error - ';
		echo mysqli_error($conn);
	}
}

function isCpfValido($cpf){
	
	global $conn;
	
	//Verificar se já existe o CPF no BD
	
	$sql  = "SELECT * FROM comprador ";
	$sql .= "WHERE cpf = '$cpf' ";
	
	if ($result = mysqli_query($conn, $sql)) {
		$row_cnt = mysqli_num_rows($result);
		if($row_cnt >= 1){
			return false;
		}
		else{
			return true;
		}
	}
	else{
		echo 'error - ';
		echo mysqli_error($conn);
	}
	
}

function isCompradorJogoMaximo($idComprador){
	
	global $conn;
	
	//Verificar se um comprador já está concorrendo ao número máximo de jogos (3) 
	
	$sql  = "SELECT * FROM comprador_jogo ";
	$sql .= "WHERE idComprador = '$idComprador' ";
	
	if ($result = mysqli_query($conn, $sql)) {
		$row_cnt = mysqli_num_rows($result);
		if($row_cnt >= 3){
			return true;
		}
		else
			return false;
	}
	else{
		echo 'error - ';
		echo mysqli_error($conn);
	}
}


function adminPesquisaJogoNaoSort () {
	global $conn;
	
	$sql  = "SELECT j.*, ";
	$sql .= "time1.selecao AS selecao1,time1.bandeira AS bandeira1, ";
	$sql .= "time2.selecao AS selecao2, time2.bandeira AS bandeira2 ";
	$sql .= "FROM jogo j "; 												
	$sql .= "INNER JOIN time time1 ON (j.idTime1 = time1.idTime)  ";  
	$sql .= "INNER JOIN time time2 ON (j.idTime2 = time2.idTime) ";
	$sql .= "WHERE j.is_sorteado=0;";
	
	if ($result = mysqli_query($conn, $sql)){
		while ($row = mysqli_fetch_array($result)){
			$rows[] = $row;
		}
			mysqli_free_result($result);
			return $rows;
	}
	else{
		echo 'error - ';
		echo mysqli_error($conn);
	}
	
}

function adminPesquisaJogoSort () {
	global $conn;
	
	$sql  = "SELECT j.*, ";
	$sql .= "time1.selecao AS selecao1,time1.bandeira AS bandeira1, ";
	$sql .= "time2.selecao AS selecao2, time2.bandeira AS bandeira2 ";
	$sql .= "FROM jogo j "; 												
	$sql .= "INNER JOIN time time1 ON (j.idTime1 = time1.idTime)  ";  
	$sql .= "INNER JOIN time time2 ON (j.idTime2 = time2.idTime) ";
	$sql .= "WHERE j.is_sorteado=1;";
	
	if ($result = mysqli_query($conn, $sql)){
		while ($row = mysqli_fetch_array($result)){
			$rows[] = $row;
		}
			mysqli_free_result($result);
			return $rows;
	}
	else{
		echo 'error - ';
		echo mysqli_error($conn);
	}
	
}

function adminPesquisaCompSort () {
	global $conn;
	
	$sql   = "SELECT * from comprador C ";
	$sql  .= "INNER JOIN sorteio S ";
	$sql  .= "WHERE C.idComprador = S.idComprador ";
	$sql  .= "ORDER BY C.nome ";
	
	if ($result = mysqli_query($conn, $sql)){
		while ($row = mysqli_fetch_array($result)){
			$rows[] = $row;
		}
			mysqli_free_result($result);
			return $rows;
	}
	else{
		echo 'error - ';
		echo mysqli_error($conn);
	}
	
}

function adminPesquisaCompPorJogo ($jogo) {
	global $conn;
	
	$sql  = "SELECT C.*, S.* from comprador C ";
	$sql .= "INNER JOIN sorteio S ";
	$sql .= "ON C.idComprador=S.idComprador ";
	$sql .= "AND S.idJogo =".$jogo;
	$sql .= " ORDER BY C.nome";
	
	
	$rows = null;
	
	if ($result = mysqli_query($conn, $sql)){
		while ($row = mysqli_fetch_array($result)){
			$rows[] = $row;
		}
			mysqli_free_result($result);
			return $rows;
	}
	else{
		echo 'error - ';
		echo mysqli_error($conn);
	}
	
}


//Passando o ID retorna o JOGO (ex: brasil X espanha)
function getJogoById ($idJogo) {
	global $conn;

	$sql  = "SELECT j.*, ";
	$sql .= "time1.selecao AS selecao1,time1.bandeira AS bandeira1, ";
	$sql .= "time2.selecao AS selecao2, time2.bandeira AS bandeira2 ";
	$sql .= "FROM jogo j "; 												
	$sql .= "INNER JOIN time time1 ON (j.idTime1 = time1.idTime)  ";  
	$sql .= "INNER JOIN time time2 ON (j.idTime2 = time2.idTime) ";
	$sql .= "WHERE idJogo=".$idJogo;
	
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	
	$jogo = $row['selecao1']." X ".$row['selecao2'];
	return $jogo;
	
}
//verifica quantidade de ingressos
function quantidadeIngressos ($id){
	global $conn;
	$sql  = "SELECT * FROM jogo ";
	$sql .= "WHERE idJogo=".$id;
	
	if ($result = mysqli_query($conn, $sql)){
		$row = null;
		$row = mysqli_fetch_array($result);
		return $row['maxIngresso'];
	}
}




//Retorna os compradores sorteados
function sortearCompradores($idJogo,$numSorteado){
	
	global $conn;
	
	//Pega os compradores da tabela comprador_jogo de forma aleatória que estejam concorrendo a
	//um determinado jogo que vai sorteado pelo ADMIN;
	
	$sql  = "SELECT idComprador FROM comprador_jogo ";
	$sql .= "WHERE idJogo = $idJogo ";
	$sql .= "AND idComprador NOT IN (SELECT idComprador FROM sorteio) ";
	$sql .= "ORDER BY RAND() ";
	$sql .= "LIMIT $numSorteado ";
	
	
	if ($result = mysqli_query($conn, $sql)) {
		$rows = null;
		while ($row = mysqli_fetch_array($result)) {
			$rows []= $row;
		}
			mysqli_free_result($result);
			return $rows;
	}
	else{
		echo 'error - ';
		echo mysqli_error($conn);
	}
}

function isSorteado($idComprador){
	
	global $conn;
	
	//Verificar se um comprador já foi sorteado 
	
	$sql  = "SELECT * FROM sorteio ";
	$sql .= "WHERE idComprador = '$idComprador' ";
	
	if ($result = mysqli_query($conn, $sql)) {
		$row_cnt = mysqli_num_rows($result);
		if($row_cnt >= 1){
			return true;
		}
		else
			return false;
	}
	else{
		echo 'error - ';
		echo mysqli_error($conn);
	}
}

function countIngressosSorteados($idJogo){
	
	global $conn;
	
	
	$sql  = "SELECT * FROM sorteio ";
	$sql .= "WHERE idJogo = $idJogo ";
	
	if ($result = mysqli_query($conn, $sql)) {
		$row_cnt = mysqli_num_rows($result);
		return $row_cnt;
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