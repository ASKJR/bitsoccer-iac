<?php
	$classCompradorHome     ="";
	$classCompradorPesquisa ="";
	
	//Ajustando a classe 'css' para o menu do TOP ficar selecionado
	if($_SERVER["PHP_SELF"] === "/comprador/compradorHome.php"){
		$classCompradorHome = "start selected";
	}
	else if($_SERVER["PHP_SELF"] === "/comprador/compradorPesquisa.php"){
		$classCompradorPesquisa = "start selected";
	}
?>
<ul>
	<li  class="<?=$classCompradorHome?>">
		<a href="compradorHome.php?idComprador=<?=$_GET["idComprador"]?>">Home</a>
	</li>
   	<li  class="<?=$classCompradorPesquisa?>">
		<a href="compradorPesquisa.php?idComprador=<?=$_GET["idComprador"]?>">Pesquisa</a>
	</li>
 	<li class="end">
		<a href="../logout.php">Logout</a>
	</li>
</ul>