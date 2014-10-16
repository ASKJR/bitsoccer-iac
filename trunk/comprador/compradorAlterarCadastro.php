<?php
require("../db/connection.php");
require("../db/crud.php");
require("../function/validation.php")
	
	
	$sucess="";
	
	//Traz para o formulário os dados previamente cadastrados no BD.
	if($_GET["idComprador"] != ""){ 
		$comprador = selectCompradorById($_GET["idComprador"]);
	}
	
	//Caso o comprador realize alguma alteração
	if(isset($_POST["submit"])){
		$required = array(
		$_POST["nome"],$_POST["cpf"],$_POST["rg"],$_POST["nascimento"],
		$_POST["cep"],$_POST["logradouro"],$_POST["bairro"],$_POST["cidade"],$_POST["estado"],$_POST["numero"],
		$_POST["email"]
		);
		if(isFormValido($required)){
			$idComprador = trim($_GET["idComprador"]);
			//Atualizando as tabelas
			if($idComprador != ""){
				atualizarComprador($idComprador,$_POST["nome"],$_POST["cpf"],$_POST["rg"],$_POST["nascimento"]);
				atualizarEndereco ($idComprador,$_POST["cep"],$_POST["logradouro"],$_POST["bairro"],$_POST["cidade"],$_POST["estado"],$_POST["numero"]);
				atualizarUsuario  ($idComprador,$_POST["email"]);
				$sucess = true;
			}
		}
		else{
			$sucess = false;
		}
	}
?>
<html>
<head>
<?php include("../include.php"); ?>
</head>
<body>
<div id="container">
  <header>
	<div class="width">
		<h1><a href="#">BitS<img src="../img/soccer_sport-32.png">ccer</a></h1>
	</div>
    </header>
    <nav>
	<div class="width">
		<?php include("compradorMenuTop.php") ?>
	</div>
    </nav>

    <div id="body" class="width">
		
        <section id="content">

			<article>
				<h2> Cadastro do usuário:</h2>
			<br>
			<form action="cadastroUser.php" method="POST" id="formCadastroUser">
				<fieldset>
					<legend>Dados pessoais:</legend>
					<br>
						<p>
							<label for="nome">Nome:</label>
							<input value="<?=$comprador['nome']?>" class="validate[required]" name="nome" id="nome"  type="text" size="60"  />
						</p>
						<p>
							<label for="cpf">CPF:</label>
							<input value="<?=$comprador['cpf']?>" class="validate[required] cpf" name="cpf" id="cpf"  type="text" size="14" maxlength="14" class="cpf" />
						</p>
						<p>
							<label for="rg">RG:</label>
							<input value="<?=$comprador['rg']?>" class="validate[required]" name="rg" id="rg"  type="text" size="14" maxlength="14"/ >
						</p>
						<p>
							<label for="nascimento">Nascimento:</label>
							<input value="<?=$comprador['nascimento']?>" class="validate[required]" name="nascimento" id="nascimento"  type="date" />
						</p>
						<p>
							<label for="email">E-mail:</label>
							<input value="<?=$comprador['login']?>" class="validate[required,custom[email]]"  type="text" name="email" id="email" size="35"/>
						</p>
						<br>
				</fieldset>
				<fieldset>
						<legend>Endereço:</legend>
						<br>
						<p>
							<label for="cep">CEP:</label>
							<input value="<?=$comprador['cep']?>" class="validate[required] cep" name="cep" id="cep"  type="cep" size="7"/>
							<img src="../img/search.png" alt="Procurar Endereço" title="Procurar Endereço" id="lupa" >
						</p>
						<p>
							<label for="logradouro">Logradouro:</label>
							<input value="<?=$comprador['logradouro']?>" class="validate[required]" name="logradouro" id="logradouro"  type="logradouro" size="50"/>
						</p>
						<p>
							<label for="numero">Número:</label>
							<input value="<?=$comprador['numero']?>" class="validate[required] num" name="numero" id="numero"  type="numero" size="10" />
						</p>
						
						<p>
							<label for="uf">Estado:</label>
							<input value="<?=$comprador['estado']?>" class="validate[required]" name="estado" id="estado"  type="estado" size="2" maxlength="2"/>
						</p>
						<p>
							<label for="cidade">Cidade:</label>
							<input value="<?=$comprador['cidade']?>" class="validate[required]" name="cidade" id="cidade"  type="cidade" size="25"/>
						</p>
						<p>
							<label for="bairro">Bairro:</label>
							<input value="<?=$comprador['bairro']?>" class="validate[required]" name="bairro" id="bairro"  type="bairro" size="25"/>
						</p>
						<p><input name="submit" style="margin-left: 150px;" class="formbutton" value="Alterar" type="submit" /></p>
				</fieldset>
			</form>
			</article>
        </section>
        <aside class="sidebar">
			<?php include("compradorMenu.php") ?>
        </aside>
    	<div class="clear"></div>
    </div>
    <footer>
		<?php include("../footer.php") ?>
    </footer>
</div>
</body>
</html>
<?php 
	if($sucess===true){
		updateCompradorSucess();
		exit;
	}
	else if($sucess===false){
		 updateCompradorFail();
		exit;
	}
?>
