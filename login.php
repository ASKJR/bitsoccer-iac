<?php
require("./db/connection.php");
require("./db/crud.php");
require("./function/mensagens.php");
	
	$loginFail=false;
	
	if(isset($_POST["submit"])){
		if($_POST["email"] != "" && $_POST["senha"] != ""){
			//Validando o login do usuário no sistema; Caso retorne true sucesso
			if(loginValidation(trim($_POST["email"]),trim($_POST["senha"]))){
				//caso o usuário seja administrado
				if($_SESSION["usuario"] == "admin"){
					header("Location: /admin/adminHome.php");
					exit;
				}
				else if($_SESSION["usuario"] == "comprador"){
					header("Location: /comprador/compradorHome.php");
					exit;
				}
			}
			//Login falhou.
			else{
				$loginFail=true;
			}
		}
	}

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
        		<li><a href="index.php">Home</a></li>
         	   	<li><a href="cadastroUser.php">Cadastre-se</a></li>
          	  	<li class="end start selected" ><a href="login.php">Login</a></li>
        	</ul>
	</div>
    </nav>


    <div id="body" class="width">

		

		<section id="contentIndex">

	    <article>
			<h2> Login:</h2>
			<fieldset>
                <legend>Formulário</legend>
                <form action="login.php" method="POST" id="formLogin">
                    <p>
						<label for="login">E-mail:</label>
						<input class="validate[required,custom[email]]" name="email" id="email"  type="text" size="45" />
					</p>
					<p>
						<label for="senha">Senha:</label>
						<input class="validate[required]" name="senha" id="senha"  type="password" size="45" />
					</p>
                    <p>
						<input name="submit" style="margin-left: 150px;" class="formbutton" value="Entrar" type="submit" />
					</p>
                </form>
            </fieldset>
		</article>
        </section>
    	<div class="clear"></div> 
    </div>
    <footer>
        <div class="footer-bottom">
            <p>UFPR - Tecnologia em Análise e Desenvolvimento de Sistemas - IAC</p>
			<p> 
				Desenvolvedores:
				Ademilson Santana da Silva, 
				Alberto Sussumu Kato Junior, 
				Lucas dos Santos Canestraro.
			</p>	
         </div>
    </footer>
</div>
</body>
</html>

<?php
	//Sinaliza com um alert de erro no login
	if($loginFail){
		loginFailAlert();
		exit;
	} 
?>