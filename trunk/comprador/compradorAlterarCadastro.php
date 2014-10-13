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
         	   	<li><a href="compradorPesquisa.php">Pesquisa</a></li>
          	 	<li class="end"><a href="#">Logout</a></li>
        	</ul>
	</div>
    </nav>

    <div id="body" class="width">
		
        <section id="content">

			<article>
				<h2>Alterar dados</h2>
				<br>
				<fieldset>
                <legend>Formulário</legend>
                <form action="#" method="POST">
                    <p>
						<label for="nome">Name:</label>
						<input name="nome" id="nome"  type="text" size="50" />
					</p>
					<p>
						<label for="cpf">CPF:</label>
						<input name="cpf" id="cpf"  type="text" size="14" maxlength="14"/>
					</p>
					<p>
						<label for="rg">RG:</label>
						<input name="rg" id="rg"  type="text" size="14" maxlength="14"/>
					</p>
					<p>
						<label for="nascimento">Nascimento:</label>
						<input name="nascimento" id="nascimento"  type="date"/>
					</p>
					<p>
						<label for="email">E-mail para login:</label>
						<input name="email" id="email"  type="email" size="25"/>
					</p>
					<p>
						<label for="senha">Senha:</label>
						<input name="senha" id="senha"  type="password" size="25"/>
					</p>
					<p>
						<label for="cep">CEP:</label>
						<input name="cep" id="cep"  type="cep" size="7"/>
					</p>
					<p>
						<label for="logradouro">Logradouro:</label>
						<input name="logradouro" id="logradouro"  type="logradouro" size="25"/>
					</p>
					<p>
						<label for="numero">Número:</label>
						<input name="numero" id="numero"  type="numero" size="10"/>
					</p>
					
					<p>
						<label for="uf">Estado:</label>
						<input name="estado" id="estado"  type="estado" size="7"/>
					</p>
					<p>
						<label for="cidade">Cidade:</label>
						<input name="cidade" id="cidade"  type="cidade" size="7"/>
					</p>
					<p>
						<label for="bairro">Bairro:</label>
						<input name="bairro" id="bairro"  type="bairro" size="7"/>
					</p>
                    <p>
						<input name="alterar" style="margin-left: 150px;" class="formbutton" value="Alterar" type="submit" />
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