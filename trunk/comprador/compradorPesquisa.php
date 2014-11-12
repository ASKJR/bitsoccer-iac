<?php
	require("../db/connection.php");
	require("../db/crud.php");
	require("../function/data.php");
	require("../function/validation.php");
	require("../function/mensagens.php");
	$funcao ="";
	if(isset($_SESSION["idComprador"])){
		$usuId = $_SESSION["idComprador"];
	}
	
	if (isset($_GET["submit"])) {
		if ($_GET['tipPesq']=='jogoNaoSort'){
			$funcao = "Pesquisa/Jogos não sorteados";
			$jogos = adminPesquisaJogoNaoSort();
		}
		else if ($_GET['tipPesq']=='jogoSort'){
			$funcao = "Pesquisa/Jogos sorteados";
			$jogos = adminPesquisaJogoSort();
		}
			
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
	<div class="width">
		<?php include("compradorMenuTop.php") ?>
	</div>
    </nav>

    <div id="body" class="width">
		
        <section id="content">

			<article>
			<?php
				if (isset($_GET['submit'])){
					// ***************************** JOGO SORTEADO OU NÃO SORTEADO *****************************************
					if ($_GET['tipPesq']=='jogoNaoSort' || $_GET['tipPesq']=='jogoSort'){
						?>
						<h2><?php echo $funcao ?></h2>
						<br>
						<table cellspacing="0">
						<tr>
							<th> Time 1 </th>
							<th> Time 2 </th>
							<th> Local 	</th>
							<th> Data 	</th>
							<?php
							if ($_GET['tipPesq']=='jogoNaoSort') 
								echo "<th> Concorrer </th>";
								else echo "<th> Horário </th>";
							?>
						</tr>
					<?php
						foreach($jogos as $jogo){
								echo "<tr>";
								echo "<td class='alignTextLeft'>"."<img src='$jogo[bandeira1]' alt='Concorrer' title='Adicionar jogo'>". "-".$jogo['selecao1'] ."</td>";
								echo "<td class='alignTextLeft'>"."<img src='$jogo[bandeira2]' alt='Concorrer' title='Adicionar jogo'>". "-".$jogo['selecao2'] ."</td>";
								echo "<td>" .$jogo['local']. "</td>";
								echo "<td width='15px'>" .UserDate($jogo['data']). "</td>";
								if ($_GET['tipPesq']=='jogoNaoSort') 
								echo "<td>" ."<a href='compradorJogosConcorrendo.php?idComprador=".$_SESSION["idComprador"]."&idJogo=".$jogo['idJogo']."'>"."<img src='../img/adicionar.png' alt='Concorrer' title='Adicionar jogo'>"."</a>"."</td>";
								else echo "<td width='15px'>" .$jogo['horario']. "</td>";
								echo "</tr>"	;
						}
					?>
						</table>
				<?php
				}
				
				
				}	
				
				else {
			?>
				<h2>Pesquisa</h2>
				<fieldset>
					<legend>Search</legend>
					<form action="compradorPesquisa.php" method="GET">
						<p>
							<input name="idComprador" value="<?= $usuId?>"   type="hidden">
							<label class="lbSearch">Jogos não sorteados:</label>
							<input name="tipPesq" value="jogoNaoSort"   type="radio" checked/>
						</p>
						<p>
							<label class="lbSearch">Jogos já sorteados:</label>
							<input name="tipPesq" value="jogoSort"   type="radio"/>
						</p>
						<p>
							<input name="submit" style="margin-left: 150px;" class="formbutton" value="Pesquisar" type="submit" />
						</p>
					</form>
				</fieldset>
			<?php } ?>
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
