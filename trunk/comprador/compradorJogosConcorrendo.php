<?php
require("../db/connection.php");
require("../db/crud.php");
require("../function/data.php");
require("../function/validation.php");
require("../function/mensagens.php");
require_once("../function/data.php");

	//Verifica se o id do jogo e comprador estão setados na url
	if(isset($_GET["idComprador"]) && isset($_GET["idJogo"])){
		inserirCompradorJogo($_GET["idComprador"],$_GET["idJogo"]);
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
				<h2>Jogos concorrendo o sorteio</h2>
				<br>
				<p>Você será selecionado somente para 1 jogo das 3 opções previamente selecionadas.</p>
				<p>Aguarde o sorteio!!!</p>
				<table cellspacing="0">
					<tr>
						<th>Time 1</th>
						<th>Time 2</th>
						<th>Local</th>
						<th>Data</th>
						<th>Excluir</th>
					</tr>
					<tr>
						<td>Brazil</td>
						<td>Argentina</td>
						<td>Curitiba</td>
						<td>08/10/2014</td>
						<td><img src="../img/excluir.png" alt="Excluir" title="Excluir"></td>
					</tr>
				</table>
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
