
<?php 
	//Direcionando os diretórios corretamentamente para realizar os includes
	$path="";
	$dir = getcwd();
	if($dir ==="C:\Webserver\wamp\www\comprador" || $dir ==="C:\Webserver\wamp\www\admin"){
		$path="..";
	}
	else{
		$path=".";
	}
	//Verificando se o usuario está logado,caso contrário redirecionara para index.
	if($dir ==="C:\Webserver\wamp\www\comprador"){
		if(!isset($_SESSION['usuario'])|| $_SESSION["usuario"] != "comprador"){
			header("Location: /login.php");
		}
	}
	if($dir ==="C:\Webserver\wamp\www\admin"){
		if(!isset($_SESSION['usuario'])|| $_SESSION["usuario"] != "admin"){
			header("Location: /login.php");
		}
	
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>bitsoccer</title>
<link rel="stylesheet" href="<?=$path?>/css/styles.css" type="text/css" />
<link rel="stylesheet" href="<?=$path?>/css/validationEngine.jquery.css" type="text/css" />
<link rel="stylesheet" href="<?=$path?>/css/ui-darkness/jquery-ui-1.10.4.custom.css" type="text/css" />
<link rel="shortcut icon" href="<?=$path?>/img/soccer.ico">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<script src="<?=$path?>/js/jquery-2.1.0.min.js"></script>
<script src="<?=$path?>/js/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="<?=$path?>/js/calendariobr.js"></script>
<script src="<?=$path?>/js/jquery.mask.min.js"></script>
<script src="<?=$path?>/js/cadastroUser.js"></script>
<script src="<?=$path?>/js/cadastroJogo.js"></script>
<script src="<?=$path?>/js/cadastroSorteio.js"></script>
<script src="<?=$path?>/js/login.js"></script>
<script src="<?=$path?>/js/jquery.validationEngine-pt_BR.js"></script>
<script src="<?=$path?>/js/jquery.validationEngine.js"></script>
<script src="<?=$path?>/js/adminPesquisaComprador.js"></script>

