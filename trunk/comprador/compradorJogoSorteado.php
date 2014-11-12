<?php
require("../db/connection.php");
require("../db/crud.php");
require("../function/data.php");
require("../function/validation.php");
require("../function/mensagens.php");
require_once("../function/data.php");

	if(isset($_SESSION["idComprador"])){
		$jogo = selectJogosSorteadosByComprador($_SESSION["idComprador"]);
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
				<h2>Jogo sorteado:</h2>
				<br>
				<table cellspacing="0">
					<tr>
						<th>Time 1</th>
						<th>Time 2</th>
						<th>Local</th>
						<th>Data</th>
						<th>Comprovante</th>
					</tr>
				<?php
					if($jogo != null){
						echo "<tr>";
						echo "<td class='alignTextLeft'>"."<img src='$jogo[bandeira1]' alt='Concorrer' title='Adicionar jogo'>". "-".$jogo['selecao1'] ."</td>";
						echo "<td class='alignTextLeft'>"."<img src='$jogo[bandeira2]' alt='Concorrer' title='Adicionar jogo'>". "-".$jogo['selecao2'] ."</td>";
						echo "<td>" .$jogo['local']. "</td>";
						echo "<td width='15px'>" .UserDate($jogo['data']). "</td>";
						echo "<td><a href='compradorComprovante.php'><img src='../img/printer-icon.png'></a></td>";
						echo "</tr>";
					}
					else{
						echo "<tr>";
						echo "<td colspan='5'>Você ainda não foi sorteado. Aguarde o sorteio! </td>";
						echo "</tr>";
					}
					
				?>
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
