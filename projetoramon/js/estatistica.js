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
			$("#respostasTotais").text(" de " + dados.length);
			arrayDados = dados;
			},
				
			error: function(XMLHttpRequest, textStatus, errorThrown) 
			{ 
				alert("Status: " + textStatus + " " + "Error: " + errorThrown); 
            }  		
		});	
	});
	
	$('#respostaAtual').change(function(){
		
		$('#listarRespostas').text("");
		
		respostaAtual = $('#respostaAtual').val() - 1;

		$('#listarRespostas').append(
		
			'<div>' +
			'<br>' +
			'<h1 style="text-align:center;">' + arrayDados[respostaAtual].form_titulo + '</h1>' +
			'<br>' +
			'<h3 style="text-align:center;">Respondido em: ' + arrayDados[respostaAtual].respostas_data + '</h1>' +
			'<br>' +
			'<br>' +
			'<br>' +
			'<div style="margin-left:15px;">' +
			'<label>' + arrayDados[respostaAtual].perguntas_0 + '</label>' +
			'<br>' +
			'<label>'+ arrayDados[respostaAtual].respostas_0 + '</label>' +
			'</div>' +
			'<br>' +
			'<div style="margin-left:15px;">' +
			'<label>' + arrayDados[respostaAtual].perguntas_1 + '</label>' +
			'<br>' +
			'<label>'+ arrayDados[respostaAtual].respostas_1 + '</label>' +
			'</div>' +
			'<br>' +
			'<div style="margin-left:15px;">' +
			'<label>' + arrayDados[respostaAtual].perguntas_2 + '</label>' +
			'<br>' +
			'<label>'+ arrayDados[respostaAtual].respostas_2 + '</label>' +
			'</div>' +
			'<br>' +
			'<div style="margin-left:15px;">' +
			'<label>' + arrayDados[respostaAtual].perguntas_3 + '</label>' +
			'<br>' +
			'<label>'+ arrayDados[respostaAtual].respostas_3 + '</label>' +
			'</div>' +
			'<br>' +
			'<div style="margin-left:15px;">' +
			'<label>' + arrayDados[respostaAtual].perguntas_4 + '</label>' +
			'<br>' +
			'<label>'+ arrayDados[respostaAtual].respostas_4 + '</label>' +
			'</div>' +
			'<br>' +
			'<div style="margin-left:15px;">' +
			'<label>' + arrayDados[respostaAtual].perguntas_5 + '</label>' +
			'<br>' +
			'<label>'+ arrayDados[respostaAtual].respostas_5 + '</label>' +
			'</div>' +
			'<br>' +
			'<div style="margin-left:15px;">' +
			'<label>' + arrayDados[respostaAtual].perguntas_6 + '</label>' +
			'<br>' +
			'<label>'+ arrayDados[respostaAtual].respostas_6 + '</label>' +
			'</div>' +
			'<br>' +
			'<div style="margin-left:15px;">' +
			'<label>' + arrayDados[respostaAtual].perguntas_7 + '</label>' +
			'<br>' +
			'<label>'+ arrayDados[respostaAtual].respostas_7 + '</label>' +
			'</div>' +
			'<br>' +
			'<div style="margin-left:15px;">' +
			'<label>' + arrayDados[respostaAtual].perguntas_8 + '</label>' +
			'<br>' +
			'<label>'+ arrayDados[respostaAtual].respostas_8 + '</label>' +
			'</div>' +
			'<br>' +
			'<div style="margin-left:15px;">' +
			'<label>' + arrayDados[respostaAtual].perguntas_9 + '</label>' +
			'<br>' +
			'<label>'+ arrayDados[respostaAtual].respostas_9 + '</label>' +
			'</div>' +
			'<br>' +
			'</div>	'				
		);
	});
});