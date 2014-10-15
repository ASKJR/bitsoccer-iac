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
				<h2>Jogo sorteado</h2>
				<br>
				<p>Parabéns você foi sorteado para o seguinte jogo:</p>
				<table cellspacing="0">
					<tr>
						<th>Time 1</th>
						<th>Time 2</th>
						<th>Local</th>
						<th>Data</th>
						<th>Comprovante</th>
					</tr>
					<tr>
						<td>Brazil</td>
						<td>Argentina</td>
						<td>Curitiba</td>
						<td>08/10/2014</td>
						<td><img src="../img/printer-icon.png" alt="Imprimir" title="Imprimir"></td>
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
