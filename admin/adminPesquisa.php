<?php
	require("../db/connection.php");
	require("../db/crud.php");
	require("../function/data.php");
	require("../function/validation.php");
	require("../function/mensagens.php");
	
	$sql  = "SELECT j.*, ";
	$sql .= "time1.selecao AS selecao1,time1.bandeira AS bandeira1, ";
	$sql .= "time2.selecao AS selecao2, time2.bandeira AS bandeira2 ";
	$sql .= "FROM jogo j "; 												
	$sql .= "INNER JOIN time time1 ON (j.idTime1 = time1.idTime)  ";  
	$sql .= "INNER JOIN time time2 ON (j.idTime2 = time2.idTime) ";
	$sql .= "WHERE j.is_sorteado=true ";
	$ress = mysqli_query($conn, $sql);
	
	
	if (ISSET($_POST['submit'])) {
		if ($_POST['tipPesq']=='jogoNaoSort'){
			$funcao = "Pesquisa/Jogos não sorteados";
			$jogos = adminPesquisaJogoNaoSort();
		}
		if ($_POST['tipPesq']=='jogoSort'){
			$funcao = "Pesquisa/Jogos sorteados";
			$jogos = adminPesquisaJogoSort();
		}
		if ($_POST['tipPesq']=='compSort'){
			$funcao = "Pesquisa/Clientes sorteados";
			$compradores = adminPesquisaCompSort();
		}
		if ($_POST['tipPesq']=='compPorJogo'){
			$jogo = $_POST['selectJogo'];
			$funcao = "Pesquisa/Clientes sorteados do jogo: ".getJogoById($jogo);
			$compradores = adminPesquisaCompPorJogo($jogo);
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
		<?php include("adminMenuTop.php"); ?>
    </nav>

    <div id="body" class="width">
		
        <section id="content">

			<article>
				<?php if(isset($_POST['submit'])) {
					//********************* PESQUISA POR JOGO NÃO SORTEADO ************************************************
					if ($_POST['tipPesq']=='jogoNaoSort' || $_POST['tipPesq']=='jogoSort'){
				?>
				<h2><?php echo $funcao ?></h2>
				<br>
				<table cellspacing="0">
				<tr>
					<th> Time 1 </th>
					<th> Time 2 </th>
					<th> Local 	</th>
					<th> Data 	</th>
					<th> Alterar </th>
				</tr>
				<?php
					foreach($jogos as $jogo){
							echo "<tr>";
							echo "<td class='alignTextLeft'>"."<img src='$jogo[bandeira1]' alt='Concorrer' title='Adicionar jogo'>". "-".$jogo['selecao1'] ."</td>";
							echo "<td class='alignTextLeft'>"."<img src='$jogo[bandeira2]' alt='Concorrer' title='Adicionar jogo'>". "-".$jogo['selecao2'] ."</td>";
							echo "<td>" .$jogo['local']. "</td>";
							echo "<td width='15px'>" .UserDate($jogo['data']). "</td>";
							echo "<td width='15px'><img src=../img/update.png>";
							echo "</tr>"	;
					}
				?>
			</table>
				<?php
				}
				else if ($_POST['tipPesq']=='compSort'){
				?>
				<h2><?php echo $funcao ?></h2>
				<br>
				<table cellspacing="0">
				<tr>
					<th> Nome </th>
					<th> CPF </th>
					<th> RG 	</th>
					<th> Nascimento 	</th>
					<!--<th> Alterar </th>-->
				</tr>
				<?php
					foreach($compradores as $comprador){
							echo "<tr>";
							echo "<td class='alignTextLeft'>".$comprador['nome'] ."</td>";
							echo "<td class='alignTextLeft'>".$comprador['cpf'] ."</td>";
							echo "<td class='alignTextLeft'>".$comprador['rg'] ."</td>";
							echo "<td class='alignTextLeft'>".userDate($comprador['nascimento']) ."</td>";
							//echo "<td width='15px'><img src=../img/update.png>";
							echo "</tr>"	;
					}
				?>
				</table>
				<?php
				}
				
				
				else if ($_POST['tipPesq']=='compPorJogo'){
				?>
				<h2><?php echo $funcao ?></h2>
				<br>
				<table cellspacing="0">
				<tr>
					<th> Nome </th>
					<th> CPF </th>
					<th> RG 	</th>
					<th> Nascimento 	</th>
					<!--<th> Alterar </th>-->
				</tr>
				<?php
					if(!$compradores){
						echo "<td> Sem compradores Sorteados";
					}
					else foreach($compradores as $comprador){
							echo "<tr>";
							echo "<td class='alignTextLeft'>".$comprador['nome'] ."</td>";
							echo "<td class='alignTextLeft'>".$comprador['cpf'] ."</td>";
							echo "<td class='alignTextLeft'>".$comprador['rg'] ."</td>";
							echo "<td class='alignTextLeft'>".userDate($comprador['nascimento']) ."</td>";
							//echo "<td width='15px'><img src=../img/update.png>";
							echo "</tr>"	;
					}
				?>
				</table>
				<?php
				}
				}
				
				
				
				else { ?>
				<h2>Pesquisa</h2>
				<fieldset>
					<legend>Search</legend>
					<form action="adminPesquisa.php" id="formPesquisa" method="POST">
						<p>
							<label class="lbSearch">Jogos não sorteados:</label>
							<input name="tipPesq"   type="radio" value="jogoNaoSort" checked/>
						</p>
						<p>
							<label class="lbSearch">Jogos já sorteados:</label>
							<input name="tipPesq"   type="radio" value="jogoSort"/>
						</p>
						<p>
							<label class="lbSearch">Compradores sorteados:</label>
							<input name="tipPesq"   type="radio" value="compSort"/>
						</p>
						<p>
							<label class="lbSearch">Compradores sorteados por jogo:</label>
							<input  id="compPorJogo" name="tipPesq" type="radio" value="compPorJogo"/>
							&nbsp;&nbsp;&nbsp;<span id="teste">Jogo: </span> 
							<select name="selectJogo" id="selectJogo">
								<option> </option> 
								<?php while ($row = mysqli_fetch_row($ress)){
									echo "<option value=".$row['0'].">".$row['8']." X ".$row['10']."</option>";
								}
								?>
							</select>
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
