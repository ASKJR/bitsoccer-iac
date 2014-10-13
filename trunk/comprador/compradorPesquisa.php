<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>bitsoccer</title>
<link rel="stylesheet" href="../css/styles.css" type="text/css" />
<link rel="shortcut icon" href="../img/soccer.ico">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
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
  		  <ul>
        		<li><a href="compradorHome.php">Home</a></li>
         	   	<li class="start selected"><a href="compradorPesquisa.php">Pesquisa</a></li>
          	 	<li class="end"><a href="#">Logout</a></li>
        	</ul>
	</div>
    </nav>

    <div id="body" class="width">
		
        <section id="content">

			<article>
				<h2>Pesquisa</h2>
				<fieldset>
					<legend>Search</legend>
					<form action="#" method="POST">
						<p>
							<label class="lbSearch">Jogos não sorteados:</label>
							<input name="tipPesq"   type="radio"/>
						</p>
						<p>
							<label class="lbSearch">Jogos já sorteados:</label>
							<input name="tipPesq"   type="radio"/>
						</p>
						<p>
							<input name="pesquisar" style="margin-left: 150px;" class="formbutton" value="Pesquisar" type="submit" />
						</p>
					</form>
				</fieldset>
			</article>
        </section>
        <aside class="sidebar">
           <ul>	
               <li>
                    <h4>Opções Comprador</h4>
                    <ul>
                        <li><a href="compradorAlterarCadastro.php">Alterar Dados</li>
                        <li><a href="compradorJogosConcorrendo.php">Jogos que estou concorrendo</a></li>
                        <li><a href="compradorJogoSorteado.php">Jogo sorteado</a></li>
                    </ul>
                </li>
            </ul>
        </aside>
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