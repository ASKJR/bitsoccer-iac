$(function(){
	$("#formCadastroJogo").validationEngine();
	$("#formCadastroTime").validationEngine();
	$('.time').mask('00:00:00');
	$('.num').mask('00000');
	
	
	});
	

//oculta um time ja escolhido em outro combo
	
	$(document).ready(function () {
	var val1 = $('#time1').val();
	$('#time2').children('option[value='+val1+']').hide();
	
	$('#time1').blur(function(){
		var time1 = $(this).val();
		$('#time2').children().show();
		$('#time2').children('option[value='+time1+']').hide();
	});
	
	$('#time2').blur(function (){
		var time2 = $(this).val();
		$('#time1').children().show();
		$('#time1').children('option[value='+time2+']').hide();
	});
});