<?php
require("./db/connection.php");
require("./db/crud.php");
require("./function/data.php");
require("./function/validation.php");
require("./function/mensagens.php");
require_once("./function/data.php");

	$jogos = selectJogos();
	
?>
<html>
<head>
	<?php include("include.php"); ?>
</head>
<body>
<div id="container">
    <header>
	<div class="width">
    		<h1><a href="#">BitS<img src="./img/soccer_sport-32.png">ccer</a></h1>
       	</div>
    </header>
    <nav>
	<div class="width">
    		<ul>
        		<li class="start selected"><a href="index.php">Home</a></li>
         	   	<li><a href="cadastroUser.php">Cadastre-se</a></li>
          	  	<li class="end"><a href="login.php">Login</a></li>
        	</ul>
	</div>
    </nav>


    <div id="body" class="width">

		

		<section id="contentIndex">

	    <article>
			<h2> Jogos já sorteados</h2>
			<br>
			<table cellspacing="0">
				<tr>
					<th> Time 1 </th>
					<th> Time 2 </th>
					<th> Local 	</th>
					<th> Data 	</th>
				</tr>
				<?php
					foreach($jogos as $jogo){
						if($jogo['is_sorteado'] == true){
							echo "<tr>";
							echo "<td class='alignTextLeft'>"."<img src='$jogo[bandeira1]' alt='Concorrer' title='Adicionar jogo'>". "-".$jogo['selecao1'] ."</td>";
							echo "<td class='alignTextLeft'>"."<img src='$jogo[bandeira2]' alt='Concorrer' title='Adicionar jogo'>". "-".$jogo['selecao2'] ."</td>";
							echo "<td>" .$jogo['local']. "</td>";
							echo "<td width='15px'>" .UserDate($jogo['data']). "</td>";
							echo "</tr>";
						}
					}
				?>
			</table>
		</article>
	
		<article>
			<h2>Jogos ainda não sorteados</h2>
			<br>
			<table cellspacing="0">
				<tr>
					<th> Time 1 </th>
					<th> Time 2 </th>
					<th> Local  </th>
					<th> Data   </th>
				</tr>
				<?php
					foreach($jogos as $jogo){
						if($jogo['is_sorteado'] == false){
							echo "<tr>";
							echo "<td class='alignTextLeft'>"."<img src='$jogo[bandeira1]' alt='Concorrer' title='Adicionar jogo'>". "-".$jogo['selecao1'] ."</td>";
							echo "<td class='alignTextLeft'>"."<img src='$jogo[bandeira2]' alt='Concorrer' title='Adicionar jogo'>". "-".$jogo['selecao2'] ."</td>";
							echo "<td>" .$jogo['local']. "</td>";
							echo "<td width='15px'>" .UserDate($jogo['data']). "</td>";
							echo "</tr>";
						}
					}
				?>
			</table>
		</article>
        </section>
    	<div class="clear"></div>
    </div>
    <footer>
		<?php include("footer.php")?>
    </footer>
</div>
</body>
</html>