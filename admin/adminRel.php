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
				<h2>Relatórios</h2>
				<p>Qtd. de compradores sorteados para um determinado jogo.</p>
				<table cellspacing="0">
                <tr>
                    <th>#ID</th>
                    <th>Jogo</th>
                    <th>Qtd. sorteios</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Brazil X Russia</td>
                    <td>28</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>France X Alemanha</td>
                    <td>49</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Itália X Japão</td>
                    <td>19</td>
                </tr>

            </table>

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
