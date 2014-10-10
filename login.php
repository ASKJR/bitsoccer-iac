<!doctype html>
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
                <form action="#" method="POST">
                    <p>
						<label for="login">E-mail:</label>
						<input name="login" id="login"  type="text" size="45" />
					</p>
					<p>
						<label for="senha">Senha:</label>
						<input name="senha" id="senha"  type="password" size="45" />
					</p>
                    <p>
						<input name="send" style="margin-left: 150px;" class="formbutton" value="Entrar" type="submit" />
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