$(function() {
    $( "#calendario,#calendario2" ).datepicker({
		changeMonth: true,
        changeYear: true,
		dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Ter�a','Quarta','Quinta','Sexta','S�bado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','S�b','Dom'],
        monthNames: ['Janeiro','Fevereiro','Mar�o','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
//Read more: http://www.linhadecodigo.com.br/artigo/3604/calendario-em-jquery-criando-calendarios-com-datepicker.aspx#ixzz2wns9Gh00
	});
});