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
		<?php include("adminMenuTop.php"); ?>
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
			<?php include("adminMenu.php"); ?>
        </aside>
    	<div class="clear"></div>
    </div>
    <footer>
		<?php include("../footer.php") ?>
    </footer>
</div>
</body>
</html>
