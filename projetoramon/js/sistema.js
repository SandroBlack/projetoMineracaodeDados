$(document).ready(function(){
	
	// ESCONDE DIVS QUE NÃO SÃO NECESSARIAS NO MOMENTO (PODERIA SER FEITO NO CSS, MAS ...............) (EU NAO SEI FAZER)
	$("#escondido").css("display","none");
	
	$("#divAdicionarOpc").css("display","none");
	
	$("#menuOpc").css("display","none");
	
	// ARRAY QUE RECEBE O CONTEUDO DAS PERGUNTAS COM DIV + LABEL + INPUT
	arrayConteudo = [];
	
	// ARRAY QUE RECEBE SOMENTE AS PERGUNTAS DO USUARIO
	arrayPergunta = [];
	
	// ARRAY QUE RECEBE TODAS AS OPÇÕES DO USUARIO PARA OS TIPOS RADIO E CHECKBOX
	arrayOpc = [];
	
	// CONTADOR INICIA EM 3 POIS PRECISAMOS DEIXAR DE IGUAL COM O ARRAYCONTEUDO QUE RECEBE 3 VALORES DAQUI A POUCO E NÃO PODEMOS SOBRESCREVER
	cont = 3;

	// CONTADOR OPÇÃO SERVE PARA NÃO SOBRESCEVERMOS OS VALORES DO ARRAYOPC
	contOpc = 0;
	
	// INICANDO ARRAY COM VALOR "" POIS ESSA POSIÇÃO IRÁ RECEBER O TITULO DO FORMULARIO
	arrayConteudo[0] = "";
	
	// INICANDO ARRAY COM VALOR "" POIS ESSA POSIÇÃO IRÁ RECEBER A DESCRICAO DO FORMULARIO
	arrayConteudo[1] = "";
	
	// INICANDO ARRAY COM VALOR ABERTURA DE DIV E FORM POIS PRECISAMOS DISSO PARA ENVIAR E SER POSSIVEL RESPONDER
	arrayConteudo[2] = "<div><form>";
	
	// PARA NÃO TER DOR DE CABEÇA REMOVENDO VALORES E PARA TRABALHAR DE IGUAL PARA O ARRAY CONTEUDO INICIAMOS COM VALOR ""
	arrayPergunta[0] = "";
	
	// PARA NÃO TER DOR DE CABEÇA REMOVENDO VALORES E PARA TRABALHAR DE IGUAL PARA O ARRAY CONTEUDO INICIAMOS COM VALOR ""
	arrayPergunta[1] = "";
	
	// PARA NÃO TER DOR DE CABEÇA REMOVENDO VALORES E PARA TRABALHAR DE IGUAL PARA O ARRAY CONTEUDO INICIAMOS COM VALOR ""
	arrayPergunta[2] = "";
	
	// INICIANDO VARIAVEL VAZIA PARA RECEBER O TIPO DE INPUT
	tipoInput = "";
	
	
	// SEMPRE QUE PRESSIONAREM ALGO DO TECLADO DENTRO DO CAMPO TITULO A FUNÇÃO É ACIONADA
	$("#titulo").keyup(function(){
		
		// PEGA O VALOR DIGITADO PELO USUARIO EM TEMPO REAL
		var titulo = $("#titulo").val().toUpperCase();
		
		// ADICIONA NO ARRAY DE CONTEUDO SEMPRE QUE FOR ATUALIZADO
		arrayConteudo[0] = "<h1 style='text-align:center;'>" + titulo + "</h1><br>";
	
		// LIMPA A DIV BASE PARA PODER ADICIONAR AS NOVAS INFORMAÇÕES
		$('#base').text("");
		
		// UM FOR PARA PODER ADICIONAR TODAS AS INFORMAÇÕES QUE EXISTEM NO ARRAY
		for (var i = 0; i < arrayConteudo.length; i++)
		{
			// ESTÁ ADICIONANDO NA DIV BASE TODOS OS INDICES DO ARRAY
			$("#base").append(arrayConteudo[i]);
		}
		
	});
	
	// SEMPRE QUE PRESSIONAREM ALGO DO TECLADO DENTRO DO CAMPO TITULO A FUNÇÃO É ACIONADA
	$("#descricao").keyup(function(){
		
		// PEGA O VALOR DIGITADO PELO USUARIO EM TEMPO REAL
		var descricao = $("#descricao").val().toUpperCase();
		
		// ADICIONA NO ARRAY DE CONTEUDO SEMPRE QUE FOR ATUALIZADO
		arrayConteudo[1] = "<h4 style='text-align:center;'>" + descricao + "</h4><br>";
		
		// LIMPA A DIV BASE PARA PODER ADICIONAR AS NOVAS INFORMAÇÕES
		$('#base').text("");
			
		// UM FOR PARA PODER ADICIONAR TODAS AS INFORMAÇÕES QUE EXISTEM NO ARRAY
		for (var i = 0; i < arrayConteudo.length; i++)
		{
			// ESTÁ ADICIONANDO NA DIV BASE TODOS OS INDICES DO ARRAY
			$("#base").append(arrayConteudo[i]);
		}
		
	});
	
	// SEMPRE QUE O "BOTÃO" DUPLICAR FOR ACIONADO IRÁ ATIVAR A FUNÇÃO
	$("#duplicar").click(function(){
		
		// VERIFICA SE 10 PERGUNTAAS JÁ FORAM ADICIONADAS NO ARRAY, O IF É CONT == 13 POIS ASSIM QUE INICIALIZA A PAGINA OS ESPAÇOS 0,1,2 ESTÃO RESERVADOS
		if(cont == 13)
		{
			// ALERT AVISANDO QUE O LIMITE DE PERGUNTAS FOI ATINGIDO
			alert("Limite de perguntas atingido");
		}
		
		// CASO O LIMITE NÃO TENHA SIDO ATINGIDO ELE VAI PARA O ELSE
		else
		{
			// PEGA O VALOR QUE FOI DIGITADO NO INPUT DE PERGUNTA
			var perguntaLowerCase = $('#pergunta').val();
			
			// PEGA O VALOR QUE FOI DIGITADO NO INPUT DE PERGUNTA E TRANSFORMA EM UPPERCASE PARA PADRONIZAR
			var perguntaUpperCase = perguntaLowerCase.toUpperCase();
			
			// PEGA O VALOR DO TIPO DE PERGUNTA PARA PODER ENTRAR NAS OPÇÕES
			var tipoPergunta = $('#selecionar').val();

			// SE O INPUT PERGUNTA VIER COM VALOR "" OU 1 QUER DIZER QUE O USUARIO AINDA NÃO PREENCHEU AS INFORMAÇÕES CORRETAMENTE
			if (perguntaUpperCase == "" || tipoPergunta == 1)
			{
				// ALERTA AO USUARIO PARA PREENCHER AS INFORMAÇÕES
				alert("Por favor preencha todas as informações");
			}
			
			// SE TUDO TIVER OK IRÁ COMEÇAR O ELSE RESPONSAVEL PELAS PERGUNTAS
			else
			{
				// FOR RESPONSAVEL PARA NÃO DEIXAR QUE PERGUNTAS SE REPITAM
				for (var i = 3; i <= arrayPergunta.length; i++)
				{
					// SE A PERGUNTA DIGITA PELO USUARIO JÁ ESTIVER NO ARRAY ELE RETORNA 0 PARA CANCELAR TUDO E UM ALERTA
					if (perguntaUpperCase == arrayPergunta[i])
					{
						// ALERT PARA O USUARIO FICAR SABENDO QUE A PERGUNTA JA FOI ADICIONADA
						alert("Pergunta já adicionada");
						
						// RETURN 0 PARA CANCELAR TODAS AS OPERAÇÕES DO SCRIPT
						return 0;
					}
				}
				
				// SE TIPO DE PERGUNTA FOR DE NÚMERO 2(TIPO TEXTO) ELE ENTRA NESSE IF
				if (tipoPergunta == 2)
				{
					// ADICIONA A DIV + LABEL + INPUT NO ARRAY CONTEUDO NA POSIÇÃO DO VALOR DO CONTADOR	
					arrayConteudo[cont] =	"<div style='margin-left:15px;'>" +
											"<label>" + perguntaUpperCase +": </label>" +
											"<input type='text' style='height:30px;width:260px;font-size:16px;' id='resposta"+perguntaUpperCase+"' name='resposta"+perguntaUpperCase+"'>" +
											"</div><br>";
												
				}
				
				// SE TIPO DE PERGUNTA FOR DE NÚMERO 3(TIPO RADIO) ELE ENTRA NESSE IF
				if (tipoPergunta == 3)
				{
					// DECLARAMOS TIPOINPUT COMO RADIO PARA PODERMOS UTILIZAR DE FORMA GLOBAL
					tipoInput = "radio";
					
					// ADICIONAMOS CONTEUDO NO ARRAY OPCAO, POIS ESSE ARRAY É RESPONSAVEL PELAS OPÇÕES DOS INPUT DE TIPO RADIO,CHECKBOX	
					arrayOpc[contOpc] = "<input type='"+ tipoInput +"' name='"+ tipoInput + perguntaUpperCase + "' value='' disabled='true'>" + 
										"<input type='text' id='respostaOpc" + contOpc + "' name='respostaOpc' placeholder='Digite o valor'>";
					
					// VARIAVEL PARA PULAR UMAS LINHAS NO HTML		
					var pularLinha = "<br><br>";
					
					// ADICIONAMOS NA DIV O ARRAY OPCAO PARA SER VISIVEL PELO USUARIO	
					$("#divOpc").append(arrayOpc[contOpc] + pularLinha);
					
					// TORNAMOS A DIV DE OPÇÕES VISIVEL PARA O USUARIO	
					$("#divAdicionarOpc").css("display","block");
					
					// OCULTAMOS A DIV DE MENU PARA O USUARIO NÃO CRIAR UMA PERGUNTA EM CIMA DA ATUAL E BAGUNÇAR A PORRA TODA	
					$("#menu").css("display","none");
					
					// NO LUGAR DO ANTIGO MENU ADICIONAMOS OUTRO QUE CONTEM 2 BOTÕES PADRONIZADOS PARA PERGUNTAS DO TIPO INPUT RADIO,CHECKBOX	
					$("#menuOpc").css("display","block");
					
					// DIZEMOS QUE O CAMPO PERGUNTA VAI RECEBER O ANTIGO VALOR EM UPPERCASE	
					$('#pergunta').val(perguntaUpperCase);	
					
					// DIZEMOS QUE O CAMPO TIPO PERGUNTA IRA RECEBER O VALOR 3 (TIPO RADIO)
					$('#selecionar').val(3);
					
					// ADICIONAMOS +1 AO CONTADOR DE OPÇÕES, SEMPRE QUE É ACIONADO 	
					contOpc++;
					
					// RETORNAMOS 0 POIS A CONTINUAÇÃO DESSA FUNÇÃO É EM OUTRO LOCAL E NÃO PODEMOS DEIXAR FINALIZAR, CONTINUAÇÃO NA FUNÇÃO #finalizarOpc	
					return 0;
						
				}
				
				// SE TIPO DE PERGUNTA FOR DE NÚMERO 4(TIPO CHECKBOX) ELE ENTRA NESSE IF
				if (tipoPergunta == 4)
				{
					// DECLARAMOS TIPOINPUT COMO RADIO PARA PODERMOS UTILIZAR DE FORMA GLOBAL
					tipoInput = "checkbox";
					
					// ADICIONAMOS CONTEUDO NO ARRAY OPCAO, POIS ESSE ARRAY É RESPONSAVEL PELAS OPÇÕES DOS INPUT DE TIPO RADIO,CHECKBOX	
					arrayOpc[contOpc] = "<input type='"+ tipoInput +"' name='"+ tipoInput + perguntaUpperCase + "' value='' disabled='true'>" +
										"<input type='text' id='respostaOpc" + contOpc + "' name='respostaOpc' placeholder='Digite o valor'>";
					
					// VARIAVEL PARA PULAR UMAS LINHAS NO HTML					
					var pularLinha = "<br><br>";
					
					// ADICIONAMOS NA DIV O ARRAY OPCAO PARA SER VISIVEL PELO USUARIO	
					$("#divOpc").append(arrayOpc[contOpc] + pularLinha);
					
					// TORNAMOS A DIV DE OPÇÕES VISIVEL PARA O USUARIO	
					$("#divAdicionarOpc").css("display","block");
					
					// OCULTAMOS A DIV DE MENU PARA O USUARIO NÃO CRIAR UMA PERGUNTA EM CIMA DA ATUAL E BAGUNÇAR A PORRA TODA	
					$("#menu").css("display","none");
					
					// NO LUGAR DO ANTIGO MENU ADICIONAMOS OUTRO QUE CONTEM 2 BOTÕES PADRONIZADOS PARA PERGUNTAS DO TIPO INPUT RADIO,CHECKBOX	
					$("#menuOpc").css("display","block");
					
					// DIZEMOS QUE O CAMPO PERGUNTA VAI RECEBER O ANTIGO VALOR EM UPPERCASE	
					$('#pergunta').val(perguntaUpperCase);	

					// DIZEMOS QUE O CAMPO TIPO PERGUNTA IRA RECEBER O VALOR 4 (TIPO CHECKBOX)
					$('#selecionar').val(4);
					
					// ADICIONAMOS +1 AO CONTADOR DE OPÇÕES, SEMPRE QUE É ACIONADO
					contOpc++;
					
					// RETORNAMOS 0 POIS A CONTINUAÇÃO DESSA FUNÇÃO É EM OUTRO LOCAL E NÃO PODEMOS DEIXAR FINALIZAR, CONTINUAÇÃO NA FUNÇÃO #finalizarOpc		
					return 0;
						
						
				}
				
				// SE TIPO DE PERGUNTA FOR DE NÚMERO 5(TIPO DATA) ELE ENTRA NESSE IF
				if (tipoPergunta == 5)
				{
					// ADICIONA A DIV + LABEL + INPUT NO ARRAY CONTEUDO NA POSIÇÃO DO VALOR DO CONTADOR	
					arrayConteudo[cont] =	"<div style='margin-left:15px;'>" +
											"<label>" + perguntaUpperCase +": </label>" +
											"<input type='date' id='resposta"+perguntaUpperCase+"' name='resposta"+perguntaUpperCase+"'>" +
											"</div><br>";
												
				}
				
				// SE TIPO DE PERGUNTA FOR DE NÚMERO 6(TIPO EMAIL) ELE ENTRA NESSE IF
				if (tipoPergunta == 6)
				{
					// ADICIONA A DIV + LABEL + INPUT NO ARRAY CONTEUDO NA POSIÇÃO DO VALOR DO CONTADOR
					arrayConteudo[cont] =	"<div style='margin-left:15px;'>" +
											"<label>" + perguntaUpperCase +": </label>" +
											"<input type='email' id='resposta"+perguntaUpperCase+"' name='resposta"+perguntaUpperCase+"'>" +
											"</div><br>";
												
				}
				
				// PEGAMOS A PERGUNTA E ADICIONAMOS NO ARRAY PROPRIO DELA, O ARRAYPERGUNTA SERVE PARA LISTARMOS TODAS AS PERGUNTAS ADICIONADAS PELO USUARIO
				arrayPergunta[cont] = perguntaUpperCase;
				
				// PEGAMOS O CONTEUDO DO ARRAYPERGUNTA E ADICIONAMOS NA DIV BASE
				$("#base").append(arrayConteudo[cont]);
				
				// ADICIONAMOS +1 AO CONTADOR DE CONTEUDO E PERGUNTA, SEMPRE QUE É ACIONADO	
				cont++;
							
			}
		
			// COMO A PERGUNTA FOI FINALIZADA LEVAMOS O INPUT DE PERGUNTA A VALOR VAZIO, POIS FICARIA COM A ANTIGA PERGUNTA SEM ISSO
			$('#pergunta').val("");	

			// COMO A PERGUNTA FOI FINALIZADO LEVAMOS O INPUT DO TIPO DE PERGUNTA A VALOR VAZIO, POIS FICARIA COM O ANTIGO TIPO
			$('#selecionar').val(1);
		}
	});

	// FUNÇÃO RESPONSAVEL PELA EXCLUSÃO DAS PERGUNTAS JA ADICIONADAS PELOS USUARIOS
	$("#exclusao").click(function(){
		
		// IF PARA SABER SE EXISTE PERGUNTAS NO ARRAY, COMO TEMOS OS VALORES PADROES E RESERVADOS 0,1,2 ELE COMPARA COM 3 POIS ESSE É O TAMANHO PADRAO DO ARRAY	
		if (arrayConteudo.length == 3)
		{
			// CASO TENHA TAMANHO 3 APRESENTA UM ALERT AVISANDO QUE NÃO EXISTE PERGUNTAS PARA REMOVER
			alert("Não existe pergunta para remover");
		}
		// CASO TENHA PERGUNTAS ENTRAMOS NO ELSE
		else
		{					
			// MODIFICANDO ARRAY INICIA COM VALOR ""
			var modificandoArray = "";
			
			// MENSAGEMINICIAL É PARA UTILIZARMOS NO PROMPT E MOSTRAR AO USUARIO A PERGUNTA
			var mensagemInicial = "Deseja excluir qual das perguntas?\n";
			
			// FAZEMOS UM FOR INICIANDO EM 3 POIS É AQUI QUE COMEÇA AS PERGUNTAS
			for (var i = 3; i < arrayPergunta.length; i++)
			{
				// A CADA LOOP ADICIONA NA VARIAVEL MODIFICANDOARRAY O ANTIGO VALOR DELA MAIS O NOVO VALOR QUE É O NOME DA PERGUNTA E COMO IREMOS MOSTRAR EM UM PROMPT UTILIZAMOS O \N PARA QUEBRA DE LINHA
				modificandoArray += arrayPergunta[i] + "\n";
			}
			
			// AQUI JUNTAMOS TODAS AS INFORMAÇÕES EM UMA UNICA VARIAVEL
			var mensagemFinal = mensagemInicial + modificandoArray;
			
			// MOSTRAMOS VIA PROMPT A PERGUNTA DA MENSAGEM INICIAL MAIS TODAS AS PERGUNTAS ADICIONADAS PELO PROPRIO USUARIO
			var inicioExclusao = prompt(mensagemFinal);
			
			// TRANSFORMAMOS OQ FOI DIGITADO POR ELE EM UPPERCASE PARA PADRONIZAR
			var inicioExclusaoUpperCase = inicioExclusao.toUpperCase();
			
			// IF PARA NÃO PERMITIR QUE O PROMPT RECEBA VALORES "" E PASSE DESPERCEBIDO
			if (inicioExclusaoUpperCase == "")
			{
				// CASO ISSO ACONTEÇA DA UM ALERT AVISANDO QUE PRECISA DIGITAR ALGO
				alert("Necessário digitar a pergunta");
				
				// RETURNA 0 PARA NÃO CONTINUAR O SCRIPT
				return 0;
			}
			
			// SE O USUARIO DIGITOU ALGO ENTRA NO ELSE
			else
			{	
				// FOR PARA PERCORREMOS O ARRAYPERGUNTA E TENTAR ENCONTRAR A PERGUNTA CASO EXISTA, INICIANDO EM 3 POIS É NA CONTAGEM 3 QUE TEMOS AS PERGUNTAS
				for (var i = 3; i <= arrayPergunta.length; i++)
				{
					// SE OQ O USUARIO DIGITOU BATE COM O INDICE DO ARRAY ELE ENTRA NESSE IF
					if (inicioExclusaoUpperCase == arrayPergunta[i])
					{
						// REMOVEMOS O CONTEUDO DO ARRAY NA POSIÇÃO QUE FOI ENCONTADO
						arrayConteudo.splice(i,1);
						
						// REMOVEMOS O CONTEUDO DO ARRAY NA POSIÇÃO QUE FOI ENCONTADO
						arrayPergunta.splice(i,1);
						
						// PARAMOS O FOR POIS NÃO HA NECESSIDADE DE CONTINUAR UMA VEZ QUE ENCONTRAMOS A PERGUNTA
						break;
					}
					
					// SE O I FOR IGUAL AO TAMANHO DO ARRAY E O IF DE CIMA NÃO ATIVOU QUER DIZER QUE A PERGUNTA NÃO EXISTE
					if (i == arrayPergunta.length)
					{
						// DAMOS UM ALERT AVISANDO QUE A PERGUNTA DIGITADA NÃO FOI ENCONTRADA
						alert("Pergunta não encontrada");
						
						// PARAMOS O SCRIPT POIS NÃO QUEREMOS QUE ELE CONTINUE
						return 0;
					}
				}
				
				// LIMPAMOS A DIV BASE NO HTML
				$('#base').text("");
				
				// RODAMOS UM FOR PARA ADICIONARMOS NOVAMENTE O TITULO, DESCRIÇÃO E AS PERGUNTAS QUE FICARAM NO ARRAY
				for (var i = 0; i < arrayConteudo.length; i++)
				{
					// ADICIONAMOS O CONTEUDO DE CADA INDICE
					$("#base").append(arrayConteudo[i]);
					alert(arrayConteudo[i]);
				}
				
				// DIMINUIMOS O CONTADOR JAQ REMOVERMOS ALGO DOS ARRAYS
				cont --;
			}
		}	

	});
	
	// AQUI TEMOS A FUNÇÃO QUE FUNCIONA COM OS INPUTS DO TIPO RADIO E CHECKBOX. SEMPRE QUE O USUARIO CLICAR NO BUTTON DE + ELE ADICIONA 1 TIPO DE RESPOSTA
	$(document).on('click', '#adicionarOpc', function(){
		
		// INICIAMOS ESSA VARIAVEL PARA PEGAR O VALOR DA PERGUNTA DIGITADA PELO USUARIO
		var perguntaLowerCase = $('#pergunta').val();
			
		// TRANSFORMA O VALOR DA VARIAVEL PERGUNTA EM UPPERCASE
		var perguntaUpperCase = perguntaLowerCase.toUpperCase();
		
		// ADICIONA A NOVA RESPOSTA NO ARRAYOPC E UTILIZAMOS O CONTOPC PARA NAO SOBRESCREVER OS VALORES, ACHO QUE AQUI PODEMOS UTILIZAR O LENGTH + 1, MAS TO COM PREGUIÇA DE MEXER
		arrayOpc[contOpc] = "<input type='"+ tipoInput +"' name='"+ tipoInput + perguntaUpperCase + "' value='' disabled='true'>" +
							"<input type='text' id='respostaOpc" + contOpc + "' name='respostaOpc" + contOpc + "' placeholder='Digite o valor'>  " +
							"<input type='button' name='removerOpc' id='removerOpc' title='Exclui uma resposta adicionada' value='EXCLUIR' onclick='pegaValor("+contOpc+")'>";
		
		// VARIAVEL PARA PULAR LINHA NO HTML	
		var pularLinha = "<br><br>";
		
		// ADICIONAMOS NA DIV DE OPÇÕES A NOVA PERGUNTA	
		$("#divOpc").append(arrayOpc[contOpc] + pularLinha);
		
		// ADICIONAMOS +1 AO CONTADOR POIS ADICIONAMOS CONTEUDO NO ARRAY	
		contOpc++;
		
	});
	
	// AQUI TEMOS A FUNÇÃO QUE FUNCIONA COM OS INPUTS DO TIPO RADIO E CHECKBOX. SEMPRE QUE O USUARIO CLICAR NO BUTTON DE - ELE REMOVE A ULTIMA RESPOSTA ADICIONADA, ELA É BEM FRACA COMPARADA A OUTRA. MAS TO COM PREGUIÇA.
	$(document).on('click', '#removerOpc', function(){
		
		// INICIAMOS ESSA VARIAVEL PARA PEGAR O VALOR DA PERGUNTA DIGITADA PELO USUARIO
		var perguntaLowerCase = $('#pergunta').val();
			
		// TRANSFORMA O VALOR DA VARIAVEL PERGUNTA EM UPPERCASE
		var perguntaUpperCase = perguntaLowerCase.toUpperCase();
		
		// SE CONTOPC FOR IGUAL A 1 QUER DIZER QUE SÓ TEM 1 REPOSTA ADICIONADA E ESSA RESPOSTA NAO PODE SER APAGADA
		if(contOpc == 1)
		{
			// ALERT AVISANDO QUE NAO PODE APAGAR A RESPOSTA
			alert("Não é possivel excluir todas as respostas");
		}
		else
		{		
			// FAÇO UM FOR PARA PEGARMOS OS VALORES CASO O USUARIO TENHA DIGITADO, DE TODAS AS PERGUNTAS
			for (var i = 0; i < contOpc; i++)
			{
				// RECEBE O VALOR DO CAMPO PERGUNTA OPC + I (I SENDO QUALQUER VALOR ATÉ O LIMITE DELE)
				var recebeOpc = $("#respostaOpc" + i + "").val();
					
				// TRANSFORMA EM UPPERCASE O VALOR RECEBIDO PARA PADRONIZAR
				var recebeOpcUpperCase = recebeOpc.toUpperCase();	
				
				// COMO QUEREMOS APAGAR A PERGUNTA X NOS SOBRESCREVEMOS AO INDICE ANTERIOR FAZENDO COM QUE TENHAMOS NO FINAL 2 RESPOSTAS REPETIRADAS E RETIRANDO A RESPOSTA QUE FOI PEDIDA A EXCLUSAO	
				if(i > valorObj)
				{
					// VARIAVEL PARA PEGAR O INDICE ANTERIOR
					var novoI = i - 1;
					
					// ARRAYOPC RECEBE ESSE VALOR SOQ NO INDICE ANTERIOR DO I
					arrayOpc[novoI] =	"<input type='"+ tipoInput +"' name='"+ tipoInput + perguntaUpperCase + "' value='' disabled='true'>" +
										"<input type='text' id='respostaOpc" + novoI + "' name='respostaOpc" + novoI + "' value='"+ recebeOpcUpperCase +"'>" +
										"<input type='button' name='removerOpc' id='removerOpc' title='Exclui uma resposta adicionada' value='EXCLUIR' onclick='pegaValor("+ novoI +")'>";
				}			
				else
				{	
					// ADICIONAMOS NO ARRAYOPC O VALOR QUE FOI DIGITADO PARA NÃO SER PERDIDO SEMPRE QUE APAGAR UMA PERGUNTA
					arrayOpc[i] =	"<input type='"+ tipoInput +"' name='"+ tipoInput + perguntaUpperCase + "' value='' disabled='true'>" +
									"<input type='text' id='respostaOpc" + i + "' name='respostaOpc" + i + "' value='"+ recebeOpcUpperCase +"'>" +
									"<input type='button' name='removerOpc' id='removerOpc' title='Exclui uma resposta adicionada' value='EXCLUIR' onclick='pegaValor("+ i +")'>";
				}								
			}

			// COMO TEMOS AS 2 ULTIMAS POSIÇÕES IGUAIS REMOVEMOS ELA
			arrayOpc.splice(arrayOpc.length - 1, 1);

			// DIMINUIMOS O CONTADOR JAQ REMOVERMOS ALGO DO ARRAY	
			contOpc--;			
				
			// VARIAVEL PARA PULAR LINHA NO HTML	
			var pularLinha = "<br><br>";
			
			// LIMPAMOS A DIV DE OPÇÕES
			$('#divOpc').text("");
				
			// RODAMOS UM FOR PARA AS RESPOSTAS QUE FICARAM NO ARRAY	
			for (var i = 0; i < arrayOpc.length; i++)
			{
				// ADICIONAMOS O CONTEUDO DE CADA INDICE
				$("#divOpc").append(arrayOpc[i] + pularLinha);
			}
		}
		
	});
	
	// FUNÇÃO QUE É ATIVADA QUANDO O USUARIO QUER FINALIZAR AS PERGUNTAS DO TIPO CHECKBOX E RADIO
	$("#finalizarOpc").click(function(){
		
		// CASO ARRAYOPC TENHA TAMANHO 1 QUER DIZER QUE SO TEMOS 1 OPÇÃO E ESSE TIPO DE PERGUNTA PRECISA DE NO MINIMO 2
		if(arrayOpc.length == 1)
		{
			// DAMOS UM ALERT PARA AVISAR AO USUARIO
			alert("É necessário adicionar uma outra opção para esse tipo de pergunta");
			
			// RETORNAMOS 0 PARA FINALIZAR O SCRIPT
			return 0;
		}
		
		// SE TIVER TUDO OK ENTRAMOS NO ELSE
		else	
		{
			// INICIAMOS ESSA VARIAVEL PARA PEGAR O VALOR DA PERGUNTA DIGITADA PELO USUARIO
			var perguntaLowerCase = $('#pergunta').val();
			
			// TRANSFORMA O VALOR DA VARIAVEL PERGUNTA EM UPPERCASE
			var perguntaUpperCase = perguntaLowerCase.toUpperCase();	
			
			// FOR PARA PEGAR TODAS AS RESPOSTAS DO ARRAYOPC E JUNTAR EM UM UNICO LUGAR
			for (var i = 0; i < contOpc; i++)
			{
				// PEGAMOS OS VALORES DAS RESPOSTAS
				var recebeOpc = $("#respostaOpc" + i + "").val();
				
				// TRANSFORMAMOS EM UPPERCASE
				var recebeOpcUpperCase = recebeOpc.toUpperCase();
				
				// CASO ALGUM RESPOSTA ESTEJA EM BRANCO ATIVAMOS O IF
				if (recebeOpcUpperCase == "")
				{
					// DAMOS UM ALERT PARA O USUARIO, POIS NAO PODEMOS ADICIONAR PERGUNTAS EM BRANCO
					alert("Por favor, preencha os campos corretamente");
					
					// RETORNAMOS 0 POIS NÃO QUEREMOS CONTINUAR O SCRIPT
					return 0;
				}
				
				// SE TIVER TUDO OK ENTRAMOS NO ELSE
				else
				{
					// PEGAMOS A POSIÇÃO DO ARRAY E SOBRESCEVEMOS O VALOR DELE PARA UM NOVO QUE ESTA FORMADO E CORRETO
					arrayOpc[i] = "<input type='"+ tipoInput +"' name='"+ tipoInput + perguntaUpperCase + "' value='"+ recebeOpcUpperCase +"' >" + recebeOpcUpperCase +"<br>";
				}
			}	
		}
		
		// ADICIONAMOS A PERGUNTA DO USUARIO NO ARRAYCONTEUDO
		arrayConteudo[cont] =	"<div style='margin-left:15px;'>" +
								"<label>" + perguntaUpperCase +": </label><br>";

		// INICIAMOS UM FOR PARA ADICIONARMOS TODAS AS OPÇÕES NO ARRAY COM UM += PEGANDO O VALOR ANTIGO E ADICIONANDO O NOVO E NUNCA PERDENDO							
		for (var i = 0; i < contOpc; i++)
		{
			// A CADA INDICE ELE PEGA O VALOR ANTIGO E ADICIONA O NOVO
			arrayConteudo[cont] += arrayOpc[i];
		}
		
		// ADICIONAMOS O VALOR DA PERGUNTA NO ARRAYPERGUNTA
		arrayPergunta[cont] = perguntaUpperCase;
		
		// FECHAMOS A DIV DA PERGUNTA E DAMOS UMA QUEBRA DE LINHA
		arrayConteudo[cont] += "</div><br>";
		
		// ADICIONAMOS NA DIV BASE O CONTEUDO COMPLETO E CORRETO
		$("#base").append(arrayConteudo[cont]);
		
		// ADICIONAMOS +1 NO CONTADOR POIS FOI ADICIONADO CONTEUDO NOS ARRAYS		
		cont++;
		
		// PEGAMOS O ARRAYOPC E ZERAMOS ELE, POIS ELE SEMPRE É USADO PARA OS TIPOS RADIO E CHECKBOX, ASSIM NAO É NECESSARIO CRIAR 2 TIPOS PARA ELES E UTILIZAMOS O MESMO
		arrayOpc.splice(0, arrayOpc.length);
		
		// LEVAMOS O CONTADOR DE OPÇÃO A 0 POIS ACABAMOS COM A PERGUNTA
		contOpc = 0;
	
		// COLOCAMOS O INPUT DE PERGUNTA PARA VAZIO
		$('#pergunta').val("");	

		// COLOCAMOS O INPUT DE TIPO DE PERGUNTA PARA PADRAO
		$('#selecionar').val(1);
		
		// LIMPAMOS A DIV DE OPÇÕES POIS A PERGUNTA FOI FINALIZADA
		$("#divOpc").text("");
		
		// ESCONDEMOS A DIV DE OPÇÕES
		$("#divAdicionarOpc").css("display","none");
		
		// VOLTAMOS COM O ANTIGO MENU	
		$("#menu").css("display","block");
		
		// ESCONDEMOS O MENU DE OPÇÃO POIS A PERGUNTA JA ESTA FINALIZADA	
		$("#menuOpc").css("display","none");
	
	});
	
	// FUNÇÃO PARA DESCARTAR A PERGUNTA DO TIPO RADIO OU CHECKBOX
	$("#descartarOpc").click(function(){
		
		// COLOCAMOS O INPUT DE PERGUNTA PARA VAZIO
		$('#pergunta').val("");	

		// COLOCAMOS O INPUT DE TIPO DE PERGUNTA PARA PADRAO
		$('#selecionar').val(1);
		
		// LIMPAMOS A DIV DE OPÇÕES POIS A PERGUNTA FOI FINALIZADA
		$("#divOpc").text("");
		
		// ESCONDEMOS A DIV DE OPÇÕES
		$("#divAdicionarOpc").css("display","none");
		
		// VOLTAMOS COM O ANTIGO MENU	
		$("#menu").css("display","block");
		
		// ESCONDEMOS O MENU DE OPÇÃO POIS A PERGUNTA JA ESTA FINALIZADA	
		$("#menuOpc").css("display","none");
		
	});
	
	// FUNÇÃO PARA ENVIAR TODO O FORMULARIO PRO BANCO DE DADOS
	$("#enviar").click(function(){
		
		// PEGAMOS O VALOR DO TITULO
		var verificaTitulo = $("#titulo").val();
		
		// PEGAMOS O VALOR DA DESCRIÇÃO
		var verificaDescricao = $("#descricao").val();
		
		// SE ARRAYCONTEUDO FOR 3 OU TITULO OU DESCRICAO OU ESTIVER VAZIO NÃO PODEMOS ENVIAR O FORMULARIO POIS ESTA VAZIO
		if (arrayConteudo.length == 3 || verificaTitulo == "" || verificaDescricao == "")
		{
			// AVISAMOS QUE O FORMULARIO ESTA INCOMPLETO
			alert("Formulário incompleto");
		}
		
		// SE TIVER TUDO OK VAMOS PARA O ELSE
		else
		{				
			// JUNTAMOS TODO O ARRAYCONTEUDO NA VARIAVEL ARRAYTOSTRING
			var arrayToString = arrayConteudo.join("|");
			
			// PEGAMOS O ARRAYTOSTRING E ADICIONAMOS O FECHAMENTO DO FORM E DIV NA VARIAVEL STRINGCOMPLETO
			var stringCompleto = arrayToString + "</form></div>";
			
			// COLOCAMOS O VALOR DO STRINGCOMPLETO NO FORMULARIO INVISIVEL
			$('#FormularioCompleto').val(stringCompleto);
			
			// ENVIAMOS O FORMULARIO PARA A PAGINA PHP
			$('#EnviarFormulario').submit();
			
			// DAMOS UM ALERT QUE FOI CADASTRADO COM SUCESSO
			alert("Formulário Cadastrado com Sucesso");
		}

	});

});

function pegaValor(valor) {
    valorObj = valor;
}