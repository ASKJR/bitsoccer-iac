<?php
	require("../db/connection.php");
	require("../db/crud.php");
	require("../function/data.php");
	require("../function/validation.php");
	require("../function/mensagens.php");
	
	
	
	$sql  = "SELECT * FROM time ";
	
	$sucess = "";
	if(isset($_POST['submit'])){
		if(($_POST['submit'])=='Alterar'){
			$required = array(
				$_POST['selecao']
			);
		if (isFormValido($required)){
			$idTime = $_POST['idTime'];
			$selecao = ($_POST['selecao']);
			$texto = strtolower(removeAcentos(trim($selecao)));
			$dir = "../bandeiras/";
			if (!unlink ($_POST['bandeiraAntiga'])){
				echo "
				<script type=text/javascript>
					alert ('A bandeira nao existe');
				</script>";
				continue;
			}
			$arquivo =  ISSET($_FILES['bandeira']) ? $_FILES["bandeira"] : FALSE;
			$ext = strtolower(substr($arquivo['name'],-4));
			if (strcmp ($ext, ".jpg")==0 || strcmp ($ext, ".img")==0 || strcmp ($ext, ".png")==0){
				for ($i=0;$i<strlen($texto);$i++) {
					if ($texto[$i] == ' ') $texto[$i] = '_';
				}
				$nome_imagem = $dir.$texto.$ext;
				if (move_uploaded_file ($arquivo['tmp_name'], $nome_imagem)) {
					alteraTime($idTime, $selecao, $nome_imagem);
				}
			$sucess = true;
			}
			else echo "<script type=text/javascript> alert('Insira uma bandeira!'); history.back(-1);</script>";
			}
			
		}
		else if(($_POST['submit'])=="Excluir"){
			$idTime = $_POST['idTime'];
			deleteTime ($idTime);
		}

		
		$sucess = false;
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
				<?php 
					if (isset($_POST['submit'])){
						
						$sql .= "WHERE idTime=".$_POST['pesquisa'];
						$res = mysqli_query($conn, $sql);
						$row = mysqli_fetch_array($res);
				?>
				<h2><?php echo $row[1];?>&nbsp;&nbsp;<img src="<?php echo $row[2] ?>" height="40"></h2>
				<fieldset>
					<form action="adminCRUDTime.php" method="POST" enctype="multipart/form-data" id="formCadastroTime">
						<p>
							<label for="selecao">Nome da seleção:</label>
							<input class="validate[required]" name="selecao" id="selecao"  type="text" size="42" value="<?php echo $row[1];?>"/>
							<input name="idTime" id="idTime"  type="hidden"  value="<?php echo $row[0];?>"/>
						</p>
						
						<p>
							<label for="bandeira">Nova Bandeira:</label>
							<input class="validate[required]" type="file" name="bandeira">
							<input type="hidden" name="bandeiraAntiga" value="<?php echo $row[2];?>">
						</p>
						<p>
							<input name="submit" style="margin-left: 150px;" class="formbutton" value="Alterar" type="submit" />
							<input name="submit" style="margin-left: 150px;" class="formbutton" value="Excluir" type="submit" onclick="return confirm('Deseja realmente excluir o Time?');"/>
						</p>	
					</form>
				</legend>
				<?php } 
				else {
					
					
				?>
				<h2>Alterar/Excluir Seleção:</h2>
				<br>
				<form action="adminCRUDTime.php" method="POST" id="formCadastroTime">
					<fieldset>
						<legend>Procurar Time:</legend>
						<br>
							<p>
								<label for="nome">Seleção:</label>
								<select name="pesquisa">
								<?php  
									$res = mysqli_query($conn, $sql);
									while ($row = mysqli_fetch_array($res)) {
									echo "<option value=".$row[0].">".$row[1]."</option>";
									}
								?>
								</select>
							</p>
					</fieldset>
					<p>
						<input name="submit" style="margin-left: 150px;" class="formbutton" value="Procurar" type="submit" />
					</p>
					</fieldset>
				</form>
				<?php } ?>
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