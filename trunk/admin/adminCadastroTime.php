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
				<h2>Cadastrar time</h2>
				<fieldset>
                <legend>Formulário</legend>
					<form action="#" method="POST" enctype="multipart/form-data">
						<p>
							<label for="selecao">Nome da seleção:</label>
							<input name="selecao" id="selecao"  type="text" size="42" />
						</p>
						<p>
							<label for="bandeira">Bandeira:</label>
							<input type="file" name="picBandeira">
						</p>
						<p>
							<input name="cadastrar" style="margin-left: 150px;" class="formbutton" value="Cadastrar" type="submit" />
						</p>	
					</form>
				</legend>
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
		<?php include("../footer.php") ?>
    </footer>
</div>
</body>
</html>
