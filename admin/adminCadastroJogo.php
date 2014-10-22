	<?php
	require("../db/connection.php");
	require("../db/crud.php");
	require("../function/data.php");
	require("../function/validation.php");
	require("../function/mensagens.php");
	
	//preenche os combo-box
	$query = "SELECT * FROM time ";
	$query .= "ORDER BY selecao;";
	$res = mysqli_query($conn, $query);
	$verifica = "";
	
	if (isset($_POST['cadastrar'])){
		$required = array(
				$_POST['time1'],$_POST['time2'],$_POST['data'],$_POST['horario'],$_POST['local'],$_POST['maxTicket']
			);
		if (isFormValido($required)){
			inserirJogo($_POST['time1'],$_POST['time2'],$_POST['data'],$_POST['horario'],$_POST['local'],$_POST['maxTicket']);
			$verifica = true;
		}
		else $verifica = false;
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
				<h2>Cadastrar jogo</h2>
				<br>
				
				<fieldset>
                <legend>Formulário</legend>
                <form action="adminCadastroJogo.php" method="POST" id="formCadastroJogo">
                    <p>
						<label for="time1">Time1:</label>
						<select class="validate[required]" name="time1" id="time1">
							<?php
								while (	$row = mysqli_fetch_row($res)){
									echo "<option value=".$row[0].">".$row[1]."</option>";
								}
							?>
						</select>
					</p>
					<p>
						<label for="time2">Time2:</label>
						<select class="validate[required]" name="time2" id="time2">
							<option selected></option>
							<?php
								mysqli_data_seek($res, 0);
								while (	$row = mysqli_fetch_row($res)){
									echo "<option value=".$row[0].">".$row[1]."</option>";
								}
							?>
						</select>
					</p>
					<p>
						<label for="data">Data:</label>
						<input type="date" class="validate[required]" name="data" id="data" />
					</p>
					<p>
						<label for="horario">Horário:</label>
						<input class="validate[required] time" name="horario" id="horario"  type="time"/>
					</p>
					<p>
						<label for="local">Local:</label>
						<input class="validate[required]" name="local" id="local"  type="local" size="25"/>
					</p>
					<p>
						<label for="maxTicket">Máx. Ingrassos:</label>
						<input class="validate[required] num" name="maxTicket" id="maxTicket"  type=" numero" size="6" maxlength="4"/>
					</p>
					<p>
						<input name="cadastrar" style="margin-left: 150px;" class="formbutton" value="Cadastrar" type="submit" />
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