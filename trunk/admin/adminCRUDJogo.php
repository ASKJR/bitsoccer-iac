<?php
	require("../db/connection.php");
	require("../db/crud.php");
	require("../function/data.php");
	require("../function/validation.php");
	require("../function/mensagens.php");
	
	
	
	if (isset($_POST['submit'])){
		if ($_POST['submit']=='Alterar'){
			$required = array(
					$_POST['data'],$_POST['horario'],$_POST['local'],$_POST['maxTicket']
				);
			if (isFormValido($required)){
				alteraJogo($_POST['idJogo'],$_POST['data'],$_POST['horario'],$_POST['local'],$_POST['maxTicket']);
				$verifica = true;
				exit;
			}
			else $verifica = false;
		}
		else if ($_POST['submit']=='Excluir'){
			deleteJogo ($_POST['idJogo']);
			exit;
		}
			
	}
	else {
		$id = $_GET['idJogo'];
		//preenche os campos do jogo
		$query = "SELECT * FROM jogo ";
		$query .= "WHERE idJogo=".$id;
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		if (!$row) {
			echo "<script type=text/javascript>
				alert ('O ID informado nao existe!!');
				history.back(-1);
				</script>";
			}
		$verifica = "";
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
				<h2>Alterar Jogo <br><?php echo getJogoById($id);?></h2>
				<br>
				
				<fieldset>
                <form action="adminCRUDJogo.php?idJogo=<?php echo $_GET['idJogo']; ?>" method="POST" id="formCadastroJogo">
					<input type="hidden" name="idJogo" value="<?php echo $id;?>"/>
					<p>
						<label for="data">Data:</label>
						<input type="date" class="validate[required]" name="data" id="data" value="<?php echo $row['data'];?>"/>
					</p>
					<p>
						<label for="horario">Horário:</label>
						<input class="validate[required] time" name="horario" id="horario"  type="time" value="<?php echo $row['horario'];?>"/>
					</p>
					<p>
						<label for="local">Local:</label>
						<input class="validate[required]" name="local" id="local"  type="local" size="25" value="<?php echo $row['local'];?>"/>
					</p>
					<p>
						<label for="maxTicket">Máx. Ingrassos:</label>
						<input class="validate[required] num" name="maxTicket" id="maxTicket"  type=" numero" size="6" maxlength="4" value="<?php echo $row['maxIngresso'];?>"/>
					</p>
					<p>
						<input name="submit" style="margin-left: 150px;" class="formbutton" value="Alterar" type="submit" />
						<input name="submit" style="margin-left: 150px;" class="formbutton" value="Excluir" type="submit" onclick="return confirm('Deseja realmente excluir o jogo?');"/>
					</p>	
                </form>
            </fieldset>

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
	if($verifica===false){
		cadastroFailAlert();
		exit;
	}
?>