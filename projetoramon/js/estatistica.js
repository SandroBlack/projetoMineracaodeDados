$(document).ready(function(){
	
	$('#formularios').change(function(){
		
		nomeFormulario = $("#formularios").val();
		
		funcao = "listaFormulario";
		
		dadosajax = {funcao, nomeFormulario}
		
		$.ajax({
				
			type: 'POST',
				
			url: 'php/funcoes.php',
				
			data: dadosajax,
				
			dataType : 'json', 
				
			success: function(dados)
			{
			$("#respostaAtual").val(0);	
			$("#respostasTotais").text(" de " + dados.length);
			alert(dados[0].form_titulo);
			},
				
			error: function(XMLHttpRequest, textStatus, errorThrown) 
			{ 
				alert("Status: " + textStatus + " " + "Error: " + errorThrown); 
            }  		
		});	
	});
	
	$('#respostaAtual').change(function(){
		alert(dados[0].form_titulo);
		respostaAtual = $('#respostaAtual').val();
		
		$('#listarRespostas').append();
	});
});