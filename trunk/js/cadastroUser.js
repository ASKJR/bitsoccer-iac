$(function(){
	$('.cpf').mask('000.000.000-00', {reverse: true});
	$('.cep').mask('00000-000');
	$('.num').mask('0000000000');
	$('#lupa').click(function () {
		if($.trim($("#cep").val()) != ""){
			$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
				if(resultadoCEP["resultado"] == 1){
                $("#logradouro").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
                $("#bairro").val(unescape(resultadoCEP["bairro"]));
                $("#cidade").val(unescape(resultadoCEP["cidade"]));
                $("#estado").val(unescape(resultadoCEP["uf"]));
                $("#numero").focus();
            }
			else{
                alert("Endereço não encontrado para o cep ");
            }
			});
		}
	});
});