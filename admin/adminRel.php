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
				<h2>Relatórios</h2>
				<p>Qtd. de compradores sorteados para um determinado jogo.</p>
				<table cellspacing="0">
                <tr>
                    <th>#ID</th>
                    <th>Time1</th>
					<th>Time2</th>
                    <th>Qtd. sorteios</th>
                </tr>
                <?php
					foreach($jogos as $jogo){
						echo "<tr>";
						echo "<td>$jogo[idJogo]</td>";
						echo "<td class='alignTextLeft'>"."<img src='$jogo[bandeira1]' alt='Concorrer' title='Adicionar jogo'>". "-".$jogo['selecao1'] ."</td>";
						echo "<td class='alignTextLeft'>"."<img src='$jogo[bandeira2]' alt='Concorrer' title='Adicionar jogo'>". "-".$jogo['selecao2'] ."</td>";
						$numSorteados= countIngressosSorteados($jogo['idJogo']);
						echo "<td>$numSorteados</td>";
						echo "</tr>";
					}
				?>
            </table>

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
