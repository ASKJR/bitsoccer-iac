<?php
	$classAdminHome     ="";
	$classAdminPesquisa ="";
	
	//Ajustando a classe 'css' para o menu do TOP ficar selecionado
	if($_SERVER["PHP_SELF"] === "/admin/adminHome.php"){
		$classAdminHome = "start selected";
	}
	else if($_SERVER["PHP_SELF"] === "/admin/adminPesquisa.php"){
		$classAdminPesquisa = "start selected";
	}
?>

<div class="width">
	<ul>
		<li class="<?=$classAdminHome?>"><a href="adminHome.php">Home</a></li>
		<li class="<?=$classAdminPesquisa?>"><a href="adminPesquisa.php">Pesquisa</a></li>
		<li class="end"><a href="../logout.php">Logout</a></li>
	</ul>
</div>