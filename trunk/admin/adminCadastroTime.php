<?php
	require("../db/connection.php");
	require("../db/crud.php");
	require("../function/data.php");
	require("../function/validation.php");
	require("../function/mensagens.php");
	
	$sucess = "";
	if(isset($_POST['submit'])){
	
		$required = array(
			$_POST['selecao']
		);
		if (isFormValido($required)){
			$selecao = ($_POST['selecao']);
			$texto = strtolower(removeAcentos(trim($selecao)));
			$dir = "../bandeiras/";
			$arquivo =  ISSET($_FILES['bandeira']) ? $_FILES["bandeira"] : FALSE;
			$ext = strtolower(substr($arquivo['name'],-4));
			if (strcmp ($ext, ".jpg")==0 || strcmp ($ext, ".img")==0 || strcmp ($ext, ".png")==0){
				for ($i=0;$i<strlen($texto);$i++) {
					if ($texto[$i] == ' ') $texto[$i] = '_';
				}
				$nome_imagem = $dir.$texto.$ext;
				if (move_uploaded_file ($arquivo['tmp_name'], $nome_imagem)) {
					inserirTime($selecao, $nome_imagem);
				}
			$sucess = true;
			}
			else echo "<script type=text/javascript> alert('Insira uma bandeira!'); history.back(-1);</script>";
			
		}
		else $sucess = false;
	}
?>
<!doctype html>
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
		<?php include("adminMenuTop.php"); ?>
    </nav>

    <div id="body" class="width">
		
        <section id="content">

			<article>
				<h2>Cadastrar time</h2>
				<fieldset>
                <legend>Formulário</legend>
					<form action="adminCadastroTime.php" method="POST" enctype="multipart/form-data" id="formCadastroTime">
						<p>
							<label for="selecao">Nome da seleção:</label>
							<input class="validate[required]" name="selecao" id="selecao"  type="text" size="42" />
						</p>
						<p>
							<label for="bandeira">Bandeira:</label>
							<input class="validate[required]" type="file" name="bandeira">
						</p>
						<p>
							<input name="submit" style="margin-left: 150px;" class="formbutton" value="Cadastrar" type="submit" />
						</p>	
					</form>
				</legend>
			</article>
        </section>
        <aside class="sidebar">
			<?php include("adminMenu.php"); ?>
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
	if($sucess===false){
		cadastroFailAlert();
		exit;
	}
?>