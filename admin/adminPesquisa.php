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
				<h2>Pesquisa</h2>
				<fieldset>
					<legend>Search</legend>
					<form action="#" method="POST">
						<p>
							<label class="lbSearch">Jogos não sorteados:</label>
							<input name="tipPesq"   type="radio"/>
						</p>
						<p>
							<label class="lbSearch">Jogos já sorteados:</label>
							<input name="tipPesq"   type="radio"/>
						</p>
						<p>
							<label class="lbSearch">Compradores sorteados:</label>
							<input name="tipPesq"   type="radio"/>
						</p>
						<p>
							<label class="lbSearch">Compradores sorteados por jogo:</label>
							<input  name="tipPesq" type="radio"/>
							&nbsp;&nbsp;&nbsp;Jogo: 
							<select name="selectJogo" id="selectJogo">
								<option> </option>
								<option>Time1 X Time2</option>
								<option>Time1 X Time3</option>
							</select>
						</p>
						<p>
							<input name="pesquisar" style="margin-left: 150px;" class="formbutton" value="Pesquisar" type="submit" />
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
