$(document).ready(function(){
	
	// ESCONDER DIV PARA ENVIO DO FORMULARIO COMPLETO
	$("#escondido").css("display","none");
	
	// INICANDO ARRAY E CONTADOR ASSIM QUE ABRIR A PAGINA
	arrayConteudo = [];
	cont = 3;

	// INICANDO ARRAY COM VALORES PADRÕES E PRESERVANDO POSIÇÕES
	arrayConteudo[0] = "";
	arrayConteudo[1] = "";
	arrayConteudo[2] = "<div><form>";

	// INICANDO ARRAY COM AS PERGUNTAS PARA NÃO PODER REPETIR E TAMBEM EXCLUIR E NÃO EXCLUIR INDICES PRESERVADOS
	arrayPergunta = [];
	arrayPergunta[0] = "";
	arrayPergunta[1] = "";
	arrayPergunta[2] = "";
	
	$("#titulo").keyup(function(){
		
		var titulo = $("#titulo").val().toUpperCase();
		
		arrayConteudo[0] = "<h1>" + titulo + "</h1><br>";
	
		$('#base').text("");
			
		for(var i = 0; i < arrayConteudo.length; i++)
			{
				$("#base").append(arrayConteudo[i]);
			}
		
	});
	
	$("#descricao").keyup(function(){
		
		var descricao = $("#descricao").val().toUpperCase();
		
		arrayConteudo[1] = "<h4>" + descricao + "</h4><br>";
	
		$('#base').text("");
			
		for(var i = 0; i < arrayConteudo.length; i++)
			{
				$("#base").append(arrayConteudo[i]);
			}
		
	});
	
	$("#duplicar").click(function(){

		var perguntaLowerCase = $('#pergunta').val();
		
		var perguntaUpperCase = perguntaLowerCase.toUpperCase();
		
		var tipoPergunta = $('#selecionar').val();

		if(perguntaUpperCase == "" || tipoPergunta == 1)
		{
			alert("Por favor preencha todas as informações");
		}
		
		else
		{
			
			for(var i = 3; i <= arrayPergunta.length; i++)
			{
				if(perguntaUpperCase == arrayPergunta[i])
				{
					alert("Pergunta já adicionada");
					return 0;
					break;
				}
			}
			
			if (tipoPergunta == 2)
				{
					arrayConteudo[cont] =	"<div>" +
											"<label>" + perguntaUpperCase +": </label>" +
											"<input type='text' id='resposta"+perguntaUpperCase+"' name='resposta"+perguntaUpperCase+"'>" +
											"</div>";
				}
			if (tipoPergunta == 3)
				{
					arrayConteudo[cont] =	"<div>" +
											"<label>" + perguntaUpperCase +": </label><br>";
					
					var quantidade = prompt("Digite a quantidade de opções:");							
					
					if(isNaN(quantidade) || quantidade == 0)
					{
						alert("Por favor, preencha os campos corretamente");
						return 0;
					}								
														
					for(var x = 0; x < quantidade; x++)
					{
						var valorMaisUm = x + 1;
						
						var nomeRadio = prompt("Escreva o valor da opção de Número: " + valorMaisUm);
						
						var nomeRadioUpperCase = nomeRadio.toUpperCase();
						
						var valorRadio = arrayConteudo[cont] + "<input type='radio' name='radio"+cont+"' value='"+nomeRadioUpperCase+"'>"+nomeRadioUpperCase+"<br>";
						
						arrayConteudo[cont] = valorRadio;
					}
					
					var fecharDiv = arrayConteudo[cont] + "</div>";
					
					arrayConteudo[cont] = fecharDiv;					
				}
			if (tipoPergunta == 4)
				{
					arrayConteudo[cont] =	"<div>" +
											"<label>" + perguntaUpperCase +": </label><br>";
					
					var quantidade = prompt("Digite a quantidade de opções:");
					
					if(isNaN(quantidade) || quantidade == 0)
					{
						alert("Por favor, preencha os campos corretamente");
						return 0;
					}

					for(var x = 0; x < quantidade; x++)
					{
						var valorMaisUm = x + 1;
						
						var nomecheckbox = prompt("Escreva o valor da opção de Número: " + valorMaisUm);
						
						var nomecheckboxUpperCase = nomecheckbox.toUpperCase();
						
						var valorcheckbox = arrayConteudo[cont] + "<input type='checkbox' name='checkbox"+cont+"' value='"+nomecheckboxUpperCase+"'>"+nomecheckboxUpperCase+"<br>";
						
						arrayConteudo[cont] = valorcheckbox;
					}
					
					var fecharDiv = arrayConteudo[cont] + "</div>";
					
					arrayConteudo[cont] = fecharDiv;
				}
				
		arrayPergunta[cont] = perguntaUpperCase;
		
		$("#base").append(arrayConteudo[cont]);
		
		cont++;
		}
	
		$('#pergunta').val("");	

		$('#selecionar').val(1);
	
	});

	$("#menu").on('click', '.excluir', function(){
		
		if(arrayConteudo.length == 3)
		{
			alert("Não existe pergunta para remover");
		}
		
		else
		{					
			var mensagemInicial = "Deseja excluir qual das perguntas?\n";
			
			var modificandoArray = arrayPergunta.join("\n");
			
			var mensagemFinal = mensagemInicial + modificandoArray;
			
			var inicioExclusao = prompt(mensagemFinal);
			
			var inicioExclusaoUpperCase = inicioExclusao.toUpperCase();
			
			if(inicioExclusaoUpperCase == "")
			{
				alert("Necessário digitar a pergunta");
				return 0;
			}
			
			else
			{	
				for(var i = 3; i <= arrayPergunta.length; i++)
				{
					if(inicioExclusaoUpperCase == arrayPergunta[i])
					{
						arrayConteudo.splice(i,1);
						
						arrayPergunta.splice(i,1);
						
						break;
					}
					
					if(i == arrayPergunta.length)
					{
						alert("Pergunta não encontrada");
						return 0;
					}
				}
				
				$('#base').text("");
				
				for(var i = 0; i < arrayConteudo.length; i++)
				{
					$("#base").append(arrayConteudo[i]);
				}
				
				cont --;
			}
		}	

	});

	$("#enviar").click(function(){
		
		if(arrayConteudo.length == 3)
		{
			alert("Formulário incompleto");
		}
		
		else
		{				
			var arrayToString = arrayConteudo.join("|");
			
			var stringCompleto = arrayToString + "</form></div>";
			
			$('#FormularioCompleto').val(stringCompleto);
			
			$('#EnviarFormulario').submit();
			
			alert("Formulário Cadastrado com Sucesso");
		}

	});

});