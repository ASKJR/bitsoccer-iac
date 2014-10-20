<?php
if(isset($_SESSION["idBuyer"])){
	unset($_SESSION["idBuyer"]);
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
		<?php include("adminMenuTop.php"); ?>
    </nav>

    <div id="body" class="width">
		
        <section id="content">

			<article>
				
			<h2>Alterar/Excluir comprador:</h2>
			<br>
			<form action="adminDeleteUpdateCliente.php" method="POST" id="formCadastroUser">
				<fieldset>
					<legend>Procurar Comprador:</legend>
					<br>
						<p>
							<label for="nome">Nome:</label>
							<input class="validate[required]" name="SearchComprador" id="SearchComprador"  type="text" size="60"  />
							<input type="hidden" name="idComprador" id="idComprador">
						</p>
				</fieldset>
				<p>
					<input name="Procurar" style="margin-left: 150px;" class="formbutton" value="Procurar" type="submit" />
				</p>
				</fieldset>
			</form>
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
