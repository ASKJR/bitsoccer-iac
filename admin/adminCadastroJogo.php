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
