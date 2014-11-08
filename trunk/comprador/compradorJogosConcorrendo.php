﻿<?php
require("../db/connection.php");
require("../db/crud.php");
require("../function/data.php");
require("../function/validation.php");
require("../function/mensagens.php");
require_once("../function/data.php");
	
	$jogos = selectJogosByComprador($_SESSION["idComprador"]);
	
	
	//Verifica se o id do jogo e comprador estão setados na url
	if(isset($_GET["idComprador"]) && isset($_GET["idJogo"])){
		inserirCompradorJogo($_GET["idComprador"],$_GET["idJogo"]);
	}
	//Excluindo um jogo que o comprador não deseja mais concorrer ao sorteio
	if(isset($_GET["idCompradorJogo"])&& isset($_GET["excluir"])){
		deleteCompradorJogoById($_GET["idCompradorJogo"]);
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
					<?php
						foreach($jogos as $jogo){
							echo "<tr>";
							echo "<td class='alignTextLeft'>"."<img src='$jogo[bandeira1]' alt='Concorrer' title='Adicionar jogo'>". "-".$jogo['selecao1'] ."</td>";
							echo "<td class='alignTextLeft'>"."<img src='$jogo[bandeira2]' alt='Concorrer' title='Adicionar jogo'>". "-".$jogo['selecao2'] ."</td>";
							echo "<td>" .$jogo['local']. "</td>";
							echo "<td width='15px'>" .UserDate($jogo['data']). "</td>";
							echo "<td>" ."<a href='compradorJogosConcorrendo.php?idComprador=".$_SESSION["idComprador"]."&idCompradorJogo=".$jogo['idCompradorJogo']."&excluir=true"."'>"."<img src='../img/excluir.png' alt='Excluir jogo' title='Excluir jogo'>"."</a>"."</td>";
							echo "</tr>";
						}
					?>	
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