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
				
			<h2>Alterar/Excluir comprador:</h2>
			<br>
			<form action="cadastroUser.php" method="POST" id="formCadastroUser">
				<fieldset>
					<legend>Dados pessoais:</legend>
					<br>
						<p>
							<label for="nome">Nome:</label>
							<input class="validate[required]" name="nome" id="nome"  type="text" size="60"  />
						</p>
						<p>
							<label for="cpf">CPF:</label>
							<input class="validate[required] cpf" name="cpf" id="cpf"  type="text" size="14" maxlength="14" class="cpf" />
						</p>
						<p>
							<label for="rg">RG:</label>
							<input class="validate[required]" name="rg" id="rg"  type="text" size="14" maxlength="14"/ >
						</p>
						<p>
							<label for="nascimento">Nascimento:</label>
							<input class="validate[required]" name="nascimento" id="nascimento"  type="date" />
						</p>
						<p>
							<label for="email">E-mail:</label>
							<input class="validate[required,custom[email]]"  type="text" name="email" id="email" size="35"/>
						</p>
						<p>
							<label for="senha">Senha:</label>
							<input class="validate[required,minSize[6]]" id="password" name="password" type="password"/>
						</p>
						<p>
							<label for="checkSenha">Confirmar senha:</label>
							<input class="validate[required,equals[password]]" id="password_two" name="password_two" type="password"/>
						</p>
						<br>
				</fieldset>
				<fieldset>
						<legend>Endereço:</legend>
						<br>
						<p>
							<label for="cep">CEP:</label>
							<input class="validate[required] cep" name="cep" id="cep"  type="cep" size="7"/>
							<img src="../img/search.png" alt="Procurar Endereço" title="Procurar Endereço" id="lupa" >
						</p>
						<p>
							<label for="logradouro">Logradouro:</label>
							<input class="validate[required]" name="logradouro" id="logradouro"  type="logradouro" size="50"/>
						</p>
						<p>
							<label for="numero">Número:</label>
							<input class="validate[required] num" name="numero" id="numero"  type="numero" size="10" />
						</p>
						
						<p>
							<label for="uf">Estado:</label>
							<input class="validate[required]" name="estado" id="estado"  type="estado" size="2" maxlength="2"/>
						</p>
						<p>
							<label for="cidade">Cidade:</label>
							<input class="validate[required]" name="cidade" id="cidade"  type="cidade" size="25"/>
						</p>
						<p>
							<label for="bairro">Bairro:</label>
							<input class="validate[required]" name="bairro" id="bairro"  type="bairro" size="25"/>
						</p>
						<p>
							<input name="Alterar" style="margin-left: 150px;" class="formbutton" value="Alterar" type="submit" />
						    <input name="Excluir" style="margin-left: 150px;" class="formbutton" value="Excluir" type="submit" />
						</p>
				</fieldset>
			</form>
			</article>
        </section>
        <aside class="sidebar">

           <ul>	
               <li>
                    <h4>Opções Administrador</h4>
                    <ul>
                        <li><a href="adminDeleteUpdateCliente.php">Alterar/Excluir Comprador</li>
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
