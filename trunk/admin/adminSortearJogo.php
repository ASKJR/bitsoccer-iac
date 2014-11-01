<?php
require("../db/connection.php");
require("../db/crud.php");
require("../function/data.php");
require("../function/validation.php");
require("../function/mensagens.php");
require_once("../function/data.php");

	$jogos = selectJogos();

	
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
		<?php include("adminMenuTop.php"); ?>
    </nav>

    <div id="body" class="width">
		
        <section id="content">

			<article>
				<h2>Sortear Jogo</h2>
				<fieldset>
                <legend>Formulário</legend>
					<form action="#" method="POST" id="formSorteio">
						<p>
							<label for="selectJogo">Selecione o jogo:</label>
							<select class="validate[required]" name="selectJogo" id="selectJogo">
								<option> </option>
								<?php
									foreach($jogos as $jogo){
										if($jogo['is_sorteado'] == false){
											echo "<option value=".$jogo['idJogo'].">";
											echo $jogo['selecao1'] . " X " . $jogo['selecao2'];
											echo "</option>";
										}
									}
								?>
							</select>
						</p>
						<p>
							<label for="qtdSorteio">Qtd. para sortear:</label>
							<input class="validate[required] numSorteio" name="qtdSorteio" id="qtdSorteio"  type="text" size="6"/>
						</p>
						<p>
							<input name="sortear" style="margin-left: 150px;" class="formbutton" value="Sortear" type="submit" />
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
