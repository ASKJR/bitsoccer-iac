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
        		<li><a href="adminHome.php">Home</a></li>
         	   	<li><a href="adminPesquisa.php">Pesquisa</a></li>
          	 	<li class="end"><a href="#">Logout</a></li>
        	</ul>
	</div>
    </nav>

    <div id="body" class="width">
		
        <section id="content">

			<article>
				<h2>Cadastrar jogo</h2>
				<br>
				
				<fieldset>
                <legend>Formulário</legend>
                <form action="#" method="POST">
                    <p>
						<label for="time1">Time1:</label>
						<select name="time1" id="time1">
							<option></option>
							<option>Brazil</option>
							<option>Japão</option>
							<option>França</option>
						</select>
					</p>
					<p>
						<label for="time2">Time2:</label>
						<select name="time2" id="time2">
							<option></option>
							<option>Brazil</option>
							<option>Japão</option>
							<option>França</option>
						</select>
					</p>
					<p>
						<label for="data">Data:</label>
						<input name="data" id="data"  type="date"/>
					</p>
					<p>
						<label for="horario">Horário:</label>
						<input name="horario" id="horario"  type="text"/>
					</p>
					<p>
						<label for="local">Local:</label>
						<input name="local" id="local"  type="local" size="25"/>
					</p>
					<p>
						<label for="maxTicket">Máx. Ingrassos:</label>
						<input name="maxTicket" id="maxTicket"  type="number" size="25"/>
					</p>
					<p>
						<input name="cadastrar" style="margin-left: 150px;" class="formbutton" value="Cadastrar" type="submit" />
					</p>	
                </form>
            </fieldset>

			</article>
        </section>
        <aside class="sidebar">

           <ul>	
               <li>
                    <h4>Opções Administrador</h4>
                    <ul>
                        <li><a href="adminDeleteUpdateCliente.php">Alterar/Excluir Cliente</li>
                        <li><a href="adminCadastroJogo.php">Cadastrar jogo</a></li>
                        <li><a href="adminCadastroTime.php">Cadastrar time</a></li>
                        <li><a href="adminSortearJogo.php">Sortear jogo</a></li>
						<li><a href="adminRel.php">Relatórios</a></li>
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