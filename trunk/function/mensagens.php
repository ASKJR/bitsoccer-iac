<?php
	
	function loginFailAlert(){
		echo
		"<script>
			alert('Não foi possível realizar o login. E-mail ou senha incorretos.');
		</script>";
	}
	function cadastroSucessAlert(){
		echo
		"<script>
			alert('Cadastro realizado com sucesso.');
		</script>";
	}
	function cadastroFailAlert(){
		echo
		"<script>
			alert('Não foi possível realizar seu cadastro.');
		</script>";
	}
	function updateCompradorSucess(){
		echo
		"<script>
			alert('Dados alterados com sucesso.');
			history.back(-1);
		</script>";
	}
	function updateAdminSucess(){
		echo
		"<script>
			alert('Dados alterados com sucesso.');
		</script>";
	}
	function updateCompradorFail(){
		echo
		"<script>
			alert('Não foi possível alterar seus dados.');
			window.location.reload();
		</script>";
	}
	function deleteCompradorSucess(){
		echo
		"<script>
			alert('O comprador foi deletado com sucesso.');
			window.location = 'adminPesquisaComprador.php'
		</script>";
	}
	
	
?>