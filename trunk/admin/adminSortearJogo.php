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
				<h2>Sortear Jogo</h2>
				<fieldset>
                <legend>Formulário</legend>
					<form action="#" method="POST">
						<p>
							<label for="selectJogo">Selecione o jogo:</label>
							<select name="selectJogo" id="selectJogo">
								<option> </option>
								<option>Time1 X Time2</option>
								<option>Time1 X Time3</option>
							</select>
						</p>
						<p>
							<label for="qtdSorteio">Qtd. para sortear:</label>
							<input name="qtdSorteio" id="qtdSorteio"  type="number"/>
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
