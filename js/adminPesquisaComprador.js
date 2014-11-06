$(function(){
	$('#selectJogo').hide();
	$('#teste').hide();
	$('#formPesquisa input[name=tipPesq]').on('change',function(){
		if($('#formPesquisa input[name=tipPesq]:checked').val()=='compPorJogo')
			$('#selectJogo').show();
		else
			$('#selectJogo').hide();
			});
	
	
	
	$("#SearchComprador").autocomplete({
		source:'adminGetAutocomplete.php',
		minLength:3,
		select: function( event, ui ) {
			var selectedObj = ui.item;
			//Passando para um campo hidden do html o valor do id do comprador.(Valor vem codificado em JSON)
			$("#idComprador").val(selectedObj.id);
		}
	});
});