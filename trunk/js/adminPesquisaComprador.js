$(function(){
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