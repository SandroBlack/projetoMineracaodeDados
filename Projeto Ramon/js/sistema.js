function verificaArray(posicao){
	document.getElementById("posicaoArray").value = posicao;
}

$(document).ready(function(){
	 arrayConteudo = [];
	 cont = 0;
	$('#campoEscondido').css("display","none");
	$('#campoEscondidoDois').css("display","none");
	$('#campoEscondidoTres').css("display","none");
	
	$("#duplicar").click(function(){
		$('#base').css("display","block");
		$('#menu').css("display","block");

		arrayConteudo[cont] = "<div class='questoes' id='divPergunta"+cont+"'><input type='text' name='pergunta"+cont+"' id='pergunta"+cont+"' placeholder='Pergunta'>" +
		"<select name='selecionar"+cont+"' id='selecionar"+cont+"'>" +
		"<option value='tipoResposta' selected='selected' onClick="+verificaArray(cont)+">Tipo de resposta</option>" +
		"<option value='campoTexto' id='campoTexto"+cont+"' name='campoTexto"+cont+"'>Campo de Texto</option>" +
		"<option value='campoRadio' id='campoRadio"+cont+"' name='campoRadio"+cont+"'>Multipla Escolha</option>" +
		"<option value='campoSelecao' id='campoSelecao"+cont+"' name='campoSelecao"+cont+"'>Caixas de Seleção</option>" +
		"<option value='caixaSelecao' id='caixaSelecao"+cont+"' name='caixaSelecao"+cont+"'>Opção unica variada</option>" +
		"</select></div>";
		$("#base").append(arrayConteudo[cont]);
		$('#contador').val(cont);
		cont++;        
	});

	$("#menu").on('click', '.excluir', function(){
		if(cont >= 0){
			var contInt = parseInt($('#contador').val());
			$("#divPergunta" + contInt + "").remove();
			arrayConteudo.splice(contInt);
			if(cont != 0)
			cont -= 1;
			$('#contador').val(cont);
		}
	});

	$(document).on('change','.questoes', function(){
		var i = parseInt($('#posicaoArray').val());
		var contInt = parseInt($('#contador').val());
		var recebeDiv = "selecionar" + i;
		var recebeInput = $("#"+recebeDiv+"").val();

		if(recebeInput == "campoTexto"){
			arrayConteudo[i] = "<div class='questoes' id='divPergunta"+i+"'><input type='text' name='pergunta"+i+"' id='pergunta"+i+"' placeholder='Pergunta'>" +
			"<input type='text' name='campo-de-texto"+i+"' placeholder='Resposta' id='campo-de-texto"+i+"' class='hide' value=''></div>";
		}			

		else if(recebeInput == "campoRadio"){
			arrayConteudo[i] = "<div class='questoes' id='divPergunta"+i+"'><input type='text' name='pergunta"+i+"' id='pergunta"+i+"' placeholder='Pergunta'>" +
			"<select name='selecionar"+i+"' id='selecionar"+i+"'>" +
			"<option value='tipoResposta'>Tipo de resposta</option>" +
			"<option value='campoTexto' id='campoTexto"+i+"' name='campoTexto"+i+"'>Campo de texto</option>" +
			"<option value='campoRadio' id='campoRadio"+i+"' name='campoRadio"+i+"' selected='selected'>Múltipla Escolha</option>" +
			"<option value='campoSelecao' id='campoSelecao"+i+"' name='campoSelecao"+i+"'>Caixas de Seleção</option>" +
			"</select><br>";

			var quantidade = prompt("Digite a quantidade de opções:");

			for(var x = 0; x < quantidade; x++){
				var valorMaisUm = x + 1;
				var nomeRadio = prompt("Escreva o valor da opção de Número: " + valorMaisUm);
				var valorRadio = arrayConteudo[i] + "<input type='radio' name='radio"+i+"' value='"+nomeRadio+"'>"+nomeRadio+"<br>";
				arrayConteudo[i] = valorRadio;
			}

			var fecharDiv = arrayConteudo[i] + "</div>";
			arrayConteudo[i] = fecharDiv;
		}

		else if(recebeInput == "campoSelecao"){
			arrayConteudo[i] = "<div class='questoes' id='divPergunta"+i+"'><input type='text' name='pergunta"+i+"' id='pergunta"+i+"' placeholder='Pergunta'>" +
			"<select name='selecionar"+i+"' id='selecionar"+i+"'>" +
			"<option value='tipoResposta'>Tipo de resposta</option>" +
			"<option value='campoTexto' id='campoTexto"+i+"' name='campoTexto"+i+"'>Campo de texto</option>" +
			"<option value='campoRadio' id='campoRadio"+i+"' name='campoRadio"+i+"'>Múltipla Escolha</option>" +
			"<option value='campoSelecao' id='campoSelecao"+i+"' name='campoSelecao"+i+"' selected='selected'>Caixas de Seleção</option>" +
			"</select><br>";

			var quantidade = prompt("Digite a quantidade de opções:");
			
			for(var y = 0; y < quantidade; y++){
				var valorMaisMais = y + 1;
				var nomeCheckbox = prompt("Escreva o valor da opção de Número: " + valorMaisMais);
				var valorCheckbox = arrayConteudo[i] + "<input type='checkbox' name='checkbox"+i+"' value='"+nomeCheckbox+"'>"+nomeCheckbox+"<br>";
				arrayConteudo[i] = valorCheckbox;
			}
			var fecharDiv2 = arrayConteudo[i] + "</div>";
			arrayConteudo[i] = fecharDiv2;
		}

		else if(recebeInput == "tipoResposta"){
			arrayConteudo[i] = "<div class='questoes' id='divPergunta"+i+"'><input type='text' name='pergunta"+i+"' id='pergunta"+i+"' placeholder='Pergunta'>" +
			"<select name='selecionar"+i+"' id='selecionar"+i+"'>" +
			"<option value='tipoResposta' selected='selected'>Tipo de resposta</option>" +
			"<option value='campoTexto' id='campoTexto"+i+"' name='campoTexto"+i+"'>Campo de texto</option>" +
			"<option value='campoRadio' id='campoRadio"+i+"' name='campoRadio"+i+"'>Múltipla Escolha</option>" +
			"<option value='campoSelecao' id='campoSelecao"+i+"' name='campoSelecao"+i+"' >Caixas de Seleção</option>" +
			"</select></div>";
		}

		
		
	});

	$("#enviar").click(function(){
		arrayJs = arrayConteudo.join("|");
		$('#Valores').val(arrayJs);
		$('#testando').submit();
		alert("Formulário Cadastrador com Sucesso");


	});
});	