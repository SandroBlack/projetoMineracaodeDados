$(document).ready(function(){
	
	// ESCONDER DIV 
	
	$("#escondido").css("display","none");
	
	$("#divAdicionarOpc").css("display","none");
	
	$("#menuOpc").css("display","none");
	
	// INICANDO ARRAYS E CONTADORES ASSIM QUE ABRIR A PAGINA
	
	arrayConteudo = [];
	
	cont = 3;
	
	arrayOpc = [];
	
	contOpc = 0;
	
	// INICANDO ARRAY COM VALORES PADRÕES E PRESERVANDO POSIÇÕES
	
	arrayConteudo[0] = "";
	
	arrayConteudo[1] = "";
	
	arrayConteudo[2] = "<div><form>";
	
	arrayPergunta = [];
	
	arrayPergunta[0] = "";
	
	arrayPergunta[1] = "";
	
	arrayPergunta[2] = "";
	
	// INICIANDO VARIAVEL VAZIA PARA RECEBER O TIPO DE INPUT
	
	tipoInput = "";
	
	$("#titulo").keyup(function(){
		
		var titulo = $("#titulo").val().toUpperCase();
		
		arrayConteudo[0] = "<h1 style='text-align:center;'>" + titulo + "</h1><br>";
	
		$('#base').text("");
			
		for (var i = 0; i < arrayConteudo.length; i++)
		{
			$("#base").append(arrayConteudo[i]);
		}
		
	});
	
	$("#descricao").keyup(function(){
		
		var descricao = $("#descricao").val().toUpperCase();
		
		arrayConteudo[1] = "<h4 style='text-align:center;'>" + descricao + "</h4><br>";
	
		$('#base').text("");
			
		for (var i = 0; i < arrayConteudo.length; i++)
		{
			$("#base").append(arrayConteudo[i]);
		}
		
	});
	
	$("#duplicar").click(function(){
		
		if(cont == 13)
		{
			alert("Limite de perguntas atingido");
		}
		else
		{
			var perguntaLowerCase = $('#pergunta').val();
			
			var perguntaUpperCase = perguntaLowerCase.toUpperCase();
			
			var tipoPergunta = $('#selecionar').val();

			if (perguntaUpperCase == "" || tipoPergunta == 1)
			{
				alert("Por favor preencha todas as informações");
			}
			else
			{
				
				for (var i = 3; i <= arrayPergunta.length; i++)
				{
					if (perguntaUpperCase == arrayPergunta[i])
					{
						alert("Pergunta já adicionada");
						
						return 0;
					}
				}
				
				if (tipoPergunta == 2)
				{
						arrayConteudo[cont] =	"<div style='margin-left:15px;'>" +
												"<label>" + perguntaUpperCase +": </label>" +
												"<input type='text' style='height:30px;width:260px;font-size:16px;' id='resposta"+perguntaUpperCase+"' name='resposta"+perguntaUpperCase+"'>" +
												"</div><br>";
												
				}
				if (tipoPergunta == 3)
				{
						tipoInput = "radio";
						
						arrayOpc[contOpc] = "<input type='"+ tipoInput +"' name='"+ tipoInput + cont + "' value='' disabled='true'>" + 
											"<input type='text' id='respostaOpc" + contOpc + "' name='respostaOpc' placeholder='Digite o valor'>";
						
						var pularLinha = "<br><br>";
						
						$("#divOpc").append(arrayOpc[contOpc] + pularLinha);
						
						$("#divAdicionarOpc").css("display","block");
						
						$("#menu").css("display","none");
						
						$("#menuOpc").css("display","block");
						
						$('#pergunta').val(perguntaUpperCase);	

						$('#selecionar').val(3);
						
						contOpc++;
						
						return 0;
						
				}
				if (tipoPergunta == 4)
				{
						tipoInput = "checkbox";
						
						arrayOpc[contOpc] = "<input type='"+ tipoInput +"' name='"+ tipoInput + cont + "' value='' disabled='true'>" +
											"<input type='text' id='respostaOpc" + contOpc + "' name='respostaOpc' placeholder='Digite o valor'>";
						
						var pularLinha = "<br><br>";
						
						$("#divOpc").append(arrayOpc[contOpc] + pularLinha);
						
						$("#divAdicionarOpc").css("display","block");
						
						$("#menu").css("display","none");
						
						$("#menuOpc").css("display","block");
						
						$('#pergunta').val(perguntaUpperCase);	

						$('#selecionar').val(3);
						
						contOpc++;
						
						return 0;
						
						
				}
				if (tipoPergunta == 5)
				{
						arrayConteudo[cont] =	"<div style='margin-left:15px;'>" +
												"<label>" + perguntaUpperCase +": </label>" +
												"<input type='date' id='resposta"+perguntaUpperCase+"' name='resposta"+perguntaUpperCase+"'>" +
												"</div><br>";
												
				}
				if (tipoPergunta == 6)
				{
						arrayConteudo[cont] =	"<div style='margin-left:15px;'>" +
												"<label>" + perguntaUpperCase +": </label>" +
												"<input type='email' id='resposta"+perguntaUpperCase+"' name='resposta"+perguntaUpperCase+"'>" +
												"</div><br>";
												
				}
					
				arrayPergunta[cont] = perguntaUpperCase;
				
				$("#base").append(arrayConteudo[cont]);
					
				cont++;
							
			}
		
			$('#pergunta').val("");	

			$('#selecionar').val(1);
		}
	});

	$("#menu").on('click', '.excluir', function(){
		
		if (arrayConteudo.length == 3)
		{
			alert("Não existe pergunta para remover");
		}
		else
		{					
			var modificandoArray = "";
			var mensagemInicial = "Deseja excluir qual das perguntas?\n";
			
			for (var i = 3; i < arrayPergunta.length; i++)
			{
				
				modificandoArray += arrayPergunta[i] + "\n";
			}
			var mensagemFinal = mensagemInicial + modificandoArray;
			
			var inicioExclusao = prompt(mensagemFinal);
			
			var inicioExclusaoUpperCase = inicioExclusao.toUpperCase();
			
			if (inicioExclusaoUpperCase == "")
			{
				alert("Necessário digitar a pergunta");
				return 0;
			}
			else
			{	
				for (var i = 3; i <= arrayPergunta.length; i++)
				{
					if (inicioExclusaoUpperCase == arrayPergunta[i])
					{
						arrayConteudo.splice(i,1);
						
						arrayPergunta.splice(i,1);
						
						break;
					}
					if (i == arrayPergunta.length)
					{
						alert("Pergunta não encontrada");
						return 0;
					}
				}
				
				$('#base').text("");
				
				for (var i = 0; i < arrayConteudo.length; i++)
				{
					$("#base").append(arrayConteudo[i]);
				}
				
				cont --;
			}
		}	

	});
	
	$(document).on('click', '#adicionarOpc', function(){
		
		arrayOpc[contOpc] = "<input type='"+ tipoInput +"' name='"+ tipoInput + cont + "' value='' disabled='true'>" +
							"<input type='text' id='respostaOpc" + contOpc + "' name='respostaOpc" + contOpc + "' placeholder='Digite o valor'>";
					
		var pularLinha = "<br><br>";
					
		$("#divOpc").append(arrayOpc[contOpc] + pularLinha);
				
		contOpc++;
		
	});
	
	$(document).on('click', '#removerOpc', function(){
		
		if (arrayOpc.length == 1)
		{
			alert("Se deseja cancelar a pergunta, clique em 'Descartar'");
		}
		else
		{
			
			for (var i = 0; i < contOpc; i++)
			{
				var recebeOpc = $("#respostaOpc" + i + "").val();
				var recebeOpcUpperCase = recebeOpc.toUpperCase();
				
				arrayOpc[i] = "<input type='"+ tipoInput +"' name='"+ tipoInput + cont + "' value='' disabled='true'>" +
							  "<input type='text' id='respostaOpc" + i + "' name='respostaOpc" + i + "' value='"+ recebeOpcUpperCase +"'>";
			}

			var removeOpc = arrayOpc.length - 1;
				
			arrayOpc.splice(removeOpc, 1);
				
			var pularLinha = "<br><br>";
		
			$('#divOpc').text("");
					
			for (var i = 0; i < arrayOpc.length; i++)
			{
				$("#divOpc").append(arrayOpc[i] + pularLinha);
			}			
					
			contOpc--;
		}
		
	});
	
	$("#finalizarOpc").click(function(){

		if(arrayOpc.length == 1)
		{
			alert("É necessário adicionar uma outra opção para esse tipo de pergunta");
			
			return 0;
		}
		else	
		{
			var perguntaLowerCase = $('#pergunta').val();
			
			var perguntaUpperCase = perguntaLowerCase.toUpperCase();	
			
			for (var i = 0; i < contOpc; i++)
			{
				var recebeOpc = $("#respostaOpc" + i + "").val();
				
				var recebeOpcUpperCase = recebeOpc.toUpperCase();
				
				if (recebeOpcUpperCase == "")
				{
					alert("Por favor, preencha os campos corretamente");
					
					return 0;
				}
				else
				{
					arrayOpc[i] = "<input type='"+ tipoInput +"' name='"+ tipoInput + cont + "' value='"+ recebeOpcUpperCase +"' >" + recebeOpcUpperCase +"<br>";
				}
			}	
		}
		
		arrayConteudo[cont] =	"<div style='margin-left:15px;'>" +
								"<label>" + perguntaUpperCase +": </label><br>";

		for (var i = 0; i < contOpc; i++)
		{
			arrayConteudo[cont] += arrayOpc[i];
		}
		
		arrayPergunta[cont] = perguntaUpperCase;
		
		arrayConteudo[cont] += "</div><br>";
		
		$("#base").append(arrayConteudo[cont]);
				
		cont++;
		
		arrayOpc.splice(0, arrayOpc.length);
		
		contOpc = 0;
	
		$('#pergunta').val("");	

		$('#selecionar').val(1);
		
		$('#pergunta').val("");	

		$('#selecionar').val(1);
		
		$("#divOpc").text("");
		
		$("#divAdicionarOpc").css("display","none");
					
		$("#menu").css("display","block");
					
		$("#menuOpc").css("display","none");
	
	});
	
	$("#descartarOpc").click(function(){
		
		$('#pergunta').val("");	

		$('#selecionar').val(1);
		
		$("#divOpc").text("");
		
		$("#divAdicionarOpc").css("display","none");
					
		$("#menu").css("display","block");
					
		$("#menuOpc").css("display","none");
		
	});
	
	$("#enviar").click(function(){
		
		var verificaTitulo = $("#titulo").val();
		
		var verificaDescricao = $("#descricao").val();
		
		if (arrayConteudo.length == 3 || verificaTitulo == "" || verificaDescricao == "")
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