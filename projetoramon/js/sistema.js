$(document).ready(function(){
	
	// ARRAY QUE RECEBE TODO O CONTEUDO DESSA PAGINA SEJA DIV + LABEL + INPUT, PERGUNTA OU RESPOSTAS
	arrayConteudo = [[],[],[]];
	
	// INICANDO ARRAY COM VALORES PARA PRESERVAR O TAMANHO
	arrayConteudo[0][0] =	"<div><form style='padding: 20px 0px 0px 20px;' name='formResposta' id='formResposta' class='forms' method='POST' action=''>" +
							"<div class='container'><input type='hidden' id='responderForm' name='responderForm' value='teste'>";
							
	arrayConteudo[0][1] =	"";
	
	arrayConteudo[0][2] =	"";
	
	// INICIANDO VARIAVEL VAZIA PARA RECEBER O TIPO DE INPUT
	tipoInput = "";
	
	// INICIANDO VARIAVE VAZIA PARA RECEBER A QUANTIDADE DE CHECKBOX ADICIONADA
	quantCheckbox = 0;
	
	// VARIAVEL PARA PULAR UMAS LINHAS NO HTML					
	pularLinha = "<br>";
	
	// SEMPRE QUE PRESSIONAREM ALGO DO TECLADO DENTRO DO CAMPO TITULO A FUNÇÃO É ACIONADA
	$("#titulo").keyup(function(){
		
		// PEGA O VALOR DIGITADO PELO USUARIO EM TEMPO REAL
		var titulo = $("#titulo").val().toUpperCase();
		
		// ADICIONA NO ARRAY DE CONTEUDO SEMPRE QUE FOR ATUALIZADO
		arrayConteudo[0][1] = "<br><h1 style='text-align:center;'>" + titulo + "</h1><br>";
	
		// LIMPA A DIV BASE PARA PODER ADICIONAR AS NOVAS INFORMAÇÕES
		$('#base').text("");
		
		// UM FOR PARA PODER ADICIONAR TODAS AS INFORMAÇÕES QUE EXISTEM NO ARRAY
		for (var i = 1; i < arrayConteudo[0].length; i++)
		{
			// ESTÁ ADICIONANDO NA DIV BASE TODOS OS INDICES DO ARRAY
			$("#base").append(arrayConteudo[0][i]);
		}
	});
	
	// SEMPRE QUE PRESSIONAREM ALGO DO TECLADO DENTRO DO CAMPO TITULO A FUNÇÃO É ACIONADA
	$("#descricao").keyup(function(){
		
		// PEGA O VALOR DIGITADO PELO USUARIO EM TEMPO REAL
		var descricao = $("#descricao").val().toUpperCase();
		
		// ADICIONA NO ARRAY DE CONTEUDO SEMPRE QUE FOR ATUALIZADO
		arrayConteudo[0][2] = "<h4 style='text-align:center;'>" + descricao + "</h4><br><br>";
		
		// LIMPA A DIV BASE PARA PODER ADICIONAR AS NOVAS INFORMAÇÕES
		$('#base').text("");
			
		// UM FOR PARA PODER ADICIONAR TODAS AS INFORMAÇÕES QUE EXISTEM NO ARRAY
		for (var i = 1; i < arrayConteudo[0].length; i++)
		{
			// ESTÁ ADICIONANDO NA DIV BASE TODOS OS INDICES DO ARRAY
			$("#base").append(arrayConteudo[0][i]);
		}
	});

	// SEMPRE QUE O "BOTÃO" DUPLICAR FOR ACIONADO IRÁ ATIVAR A FUNÇÃO
	$("#duplicar").click(function(){
		
		// RETIRAMOS A DIV DE ALERT CASO ELA ESTEJA VISIVEL
		$("#warning").css("display","none");
		
		// VERIFICA SE 10 PERGUNTAAS JÁ FORAM ADICIONADAS NO ARRAY, O IF É tamanhoArrayConteudo == 13 POIS ASSIM QUE INICIALIZA A PAGINA OS ESPAÇOS 0,1,2 ESTÃO RESERVADOS
		if(arrayConteudo[1].length == 10)
		{
			// ALERT AVISANDO QUE O LIMITE DE PERGUNTAS FOI ATINGIDO
			$("#warning").text("");
			$("#warning").append("Limite de perguntas atingido");
			$("#warning").css("display","block");
		}
		
		// CASO O LIMITE NÃO TENHA SIDO ATINGIDO ELE VAI PARA O ELSE
		else
		{			
			// PEGA O VALOR DO TIPO DE PERGUNTA PARA PODER ENTRAR NAS OPÇÕES
			var tipoPergunta = $('#selecionar').val();
			
			// PEGA O VALOR QUE FOI DIGITADO NO INPUT DE PERGUNTA E TRANSFORMA EM UPPERCASE PARA PADRONIZAR
			var perguntaUpperCase = $('#pergunta').val().toUpperCase();
	
			// SE O INPUT PERGUNTA VIER COM VALOR "" OU 1 QUER DIZER QUE O USUARIO AINDA NÃO PREENCHEU AS INFORMAÇÕES CORRETAMENTE
			if (perguntaUpperCase == "" || tipoPergunta == 1)
			{
				// ALERTA AO USUARIO PARA PREENCHER AS INFORMAÇÕES
				$("#warning").text("");
				$("#warning").append("Por favor preencha todas as informações");
				$("#warning").css("display","block");
			}
			
			// SE TUDO TIVER OK IRÁ COMEÇAR O ELSE RESPONSAVEL PELAS PERGUNTAS
			else
			{
				// FOR RESPONSAVEL PARA NÃO DEIXAR QUE PERGUNTAS SE REPITAM
				for (var i = 3; i < arrayConteudo[0].length; i++)
				{
					// SE A PERGUNTA DIGITA PELO USUARIO JÁ ESTIVER NO ARRAY ELE RETORNA 0 PARA CANCELAR TUDO E UM ALERTA
					if (perguntaUpperCase == arrayConteudo[1][i])
					{
						// ALERT PARA O USUARIO FICAR SABENDO QUE A PERGUNTA JA FOI ADICIONADA
						$("#warning").text("");
						$("#warning").append("Pergunta já adicionada");
						$("#warning").css("display","block");
						
						// RETURN 0 PARA CANCELAR TODAS AS OPERAÇÕES DO SCRIPT
						return 0;
					}
				}
				
				// SE TIPO DE PERGUNTA FOR DE NÚMERO 2(TIPO TEXTO) ELE ENTRA NESSE IF
				if (tipoPergunta == 2)
				{
					// ADICIONA A DIV + LABEL + INPUT NO ARRAY CONTEUDO NA POSIÇÃO DO VALOR DO CONTADOR	
					arrayConteudo[0][arrayConteudo[0].length] =	"<div style='margin-left:15px;'>" +
																"<label>" + perguntaUpperCase +" </label>" +
																"<input type='text' style='height:30px;width:260px;font-size:16px;' id='respostas_"+arrayConteudo[1].length+"' name='respostas_"+arrayConteudo[1].length+"'>" +
																"</div><br>";												
				}
				
				// SE TIPO DE PERGUNTA FOR DE NÚMERO 3(TIPO RADIO) ELE ENTRA NESSE IF
				else if (tipoPergunta == 3)
				{					
					// DECLARAMOS TIPOINPUT COMO RADIO PARA PODERMOS UTILIZAR DE FORMA GLOBAL
					tipoInput = "radio";
					
					// ADICIONAMOS CONTEUDO NO ARRAY OPCAO, POIS ESSE ARRAY É RESPONSAVEL PELAS OPÇÕES DOS INPUT DE TIPO RADIO,CHECKBOX	
					arrayConteudo[2][arrayConteudo[2].length] =	"<input type='"+ tipoInput +"' name='"+ tipoInput + perguntaUpperCase + "' value='' disabled='true'>" +
																"<input type='text' id='respostaOpc" + arrayConteudo[2].length + "' name='respostaOpc" + arrayConteudo[2].length + "' placeholder='Digite o valor'>  " +
																"<input type='button' name='removerOpc' id='removerOpc' title='Exclui uma resposta adicionada' value='EXCLUIR'" + 
																"onclick='pegaValor("+ arrayConteudo[2].length +")'>";
					
					// ADICIONAMOS NA DIV O ARRAY OPCAO PARA SER VISIVEL PELO USUARIO	
					$("#divOpc").append(arrayConteudo[2][arrayConteudo[2].length - 1] + pularLinha);
					
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
					
					// RETORNAMOS 0 POIS A CONTINUAÇÃO DESSA FUNÇÃO É EM OUTRO LOCAL E NÃO PODEMOS DEIXAR FINALIZAR. CONTINUAÇÃO NA FUNÇÃO #finalizarOpc	
					return 0;
				}
				
				// SE TIPO DE PERGUNTA FOR DE NÚMERO 4(TIPO CHECKBOX) ELE ENTRA NESSE IF
				else if (tipoPergunta == 4)
				{
					// DECLARAMOS TIPOINPUT COMO RADIO PARA PODERMOS UTILIZAR DE FORMA GLOBAL
					tipoInput = "checkbox";
					
					// ADICIONAMOS CONTEUDO NO ARRAY OPCAO, POIS ESSE ARRAY É RESPONSAVEL PELAS OPÇÕES DOS INPUT DE TIPO RADIO,CHECKBOX	
					arrayConteudo[2][arrayConteudo[2].length] =	"<input type='"+ tipoInput +"' name='"+ tipoInput + perguntaUpperCase + "' value='' disabled='true'>" +
																"<input type='text' id='respostaOpc" + arrayConteudo[2].length + "' name='respostaOpc" + arrayConteudo[2].length + "' placeholder='Digite o valor'>  " +
																"<input type='button' name='removerOpc' id='removerOpc' title='Exclui uma resposta adicionada' value='EXCLUIR'" + 
																"onclick='pegaValor("+ arrayConteudo[2].length +")'>";

					// ADICIONAMOS NA DIV O ARRAY OPCAO PARA SER VISIVEL PELO USUARIO	
					$("#divOpc").append(arrayConteudo[2][arrayConteudo[2].length - 1] + pularLinha);
					
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

					// RETORNAMOS 0 POIS A CONTINUAÇÃO DESSA FUNÇÃO É EM OUTRO LOCAL E NÃO PODEMOS DEIXAR FINALIZAR. CONTINUAÇÃO NA FUNÇÃO #finalizarOpc		
					return 0;						
				}
				
				// SE TIPO DE PERGUNTA FOR DE NÚMERO 5(TIPO DATA) ELE ENTRA NESSE IF
				else if (tipoPergunta == 5)
				{
					// ADICIONA A DIV + LABEL + INPUT NO ARRAY CONTEUDO NA POSIÇÃO DO VALOR DO CONTADOR	
					arrayConteudo[0][arrayConteudo[0].length] =	"<div style='margin-left:15px;'>" +
																"<label>" + perguntaUpperCase +" </label>" +
																"<input type='date' id='respostas_"+arrayConteudo[1].length+"' name='respostas_"+arrayConteudo[1].length+"'>" +
																"</div><br>";								
				}
				
				// SE TIPO DE PERGUNTA FOR DE NÚMERO 6(TIPO EMAIL) ELE ENTRA NESSE IF
				else if (tipoPergunta == 6)
				{
					// ADICIONA A DIV + LABEL + INPUT NO ARRAY CONTEUDO NA POSIÇÃO DO VALOR DO CONTADOR
					arrayConteudo[0][arrayConteudo[0].length] =	"<div style='margin-left:15px;'>" +
																"<label>" + perguntaUpperCase +" </label>" +
																"<input type='email' id='respostas_"+arrayConteudo[1].length+"' name='respostas_"+arrayConteudo[1].length+"'>" +
																"</div><br>";
				}
				
				// PEGAMOS A PERGUNTA E ADICIONAMOS NO ARRAY PROPRIO DELA, O ARRAYPERGUNTA SERVE PARA LISTARMOS TODAS AS PERGUNTAS ADICIONADAS PELO USUARIO
				arrayConteudo[1][arrayConteudo[1].length] = perguntaUpperCase;
				
				// PEGAMOS O CONTEUDO DO ARRAYPERGUNTA E ADICIONAMOS NA DIV BASE
				$("#base").append(arrayConteudo[0][arrayConteudo[0].length - 1]);
				
			}
		
			// COMO A PERGUNTA FOI FINALIZADA LEVAMOS O INPUT DE PERGUNTA A VALOR VAZIO, POIS FICARIA COM A ANTIGA PERGUNTA SEM ISSO
			$('#pergunta').val("");	

			// COMO A PERGUNTA FOI FINALIZADO LEVAMOS O INPUT DO TIPO DE PERGUNTA A VALOR VAZIO, POIS FICARIA COM O ANTIGO TIPO
			$('#selecionar').val(1);	
		}
	});

	// FUNÇÃO RESPONSAVEL PELA EXCLUSÃO DAS PERGUNTAS JA ADICIONADAS PELOS USUARIOS
	$("#exclusao").click(function(){
		
		// RETIRAMOS A DIV DE ALERT CASO ELA ESTEJA VISIVEL
		$("#warning").css("display","none");
		
		// IF PARA SABER SE EXISTE PERGUNTAS NO ARRAY, COMO TEMOS OS VALORES PADROES E RESERVADOS 0,1,2 ELE COMPARA COM 3 POIS ESSE É O TAMANHO PADRAO DO ARRAY	
		if (arrayConteudo[0].length == 3)
		{
			// CASO TENHA TAMANHO 3 APRESENTA UM ALERT AVISANDO QUE NÃO EXISTE PERGUNTAS PARA REMOVER
			$("#warning").text("");
			$("#warning").append("Não existe pergunta para remover");
			$("#warning").css("display","block");
		}
		
		// CASO TENHA PERGUNTAS ENTRAMOS NO ELSE
		else
		{					
			// MODIFICANDO ARRAY INICIA COM VALOR ""
			var modificandoEstrutura = "";
			
			// MENSAGEMINICIAL É PARA UTILIZARMOS NO PROMPT E MOSTRAR AO USUARIO A PERGUNTA
			var mensagemInicial = "Deseja excluir qual das perguntas?\n";
			
			// FAZEMOS UM FOR INICIANDO EM 3 POIS É AQUI QUE COMEÇA AS PERGUNTAS
			for (var i = 0; i < arrayConteudo[1].length; i++)
			{
				// A CADA LOOP ADICIONA NA VARIAVEL modificandoEstrutura O ANTIGO VALOR DELA MAIS O NOVO VALOR QUE É O NOME DA PERGUNTA E COMO IREMOS MOSTRAR EM UM PROMPT UTILIZAMOS O \N PARA QUEBRA DE LINHA
				modificandoEstrutura += arrayConteudo[1][i] + "\n";
			}
			
			// AQUI JUNTAMOS TODAS AS INFORMAÇÕES EM UMA UNICA VARIAVEL
			var mensagemFinal = mensagemInicial + modificandoEstrutura;
			
			// MOSTRAMOS VIA PROMPT A PERGUNTA DA MENSAGEM INICIAL MAIS TODAS AS PERGUNTAS ADICIONADAS PELO PROPRIO USUARIO
			var inicioExclusaoUpperCase = prompt(mensagemFinal).toUpperCase();
			
			// IF PARA NÃO PERMITIR QUE O PROMPT RECEBA VALORES "" E PASSE DESPERCEBIDO
			if (inicioExclusaoUpperCase == "")
			{
				// CASO ISSO ACONTEÇA DA UM ALERT AVISANDO QUE PRECISA DIGITAR ALGO
				$("#warning").text("");
				$("#warning").append("Necessário digitar a pergunta");
				$("#warning").css("display","block");
				
				// RETORNA 0 PARA NÃO CONTINUAR O SCRIPT
				return 0;
			}
			
			// SE O USUARIO DIGITOU ALGO ENTRA NO ELSE
			else
			{			
				// FOR PARA PERCORREMOS O ARRAYPERGUNTA E TENTAR ENCONTRAR A PERGUNTA CASO EXISTA, INICIANDO EM 3 POIS É NA CONTAGEM 3 QUE TEMOS AS PERGUNTAS
				for (var i = 0; i < arrayConteudo[1].length; i++)
				{
					// SE OQ O USUARIO DIGITOU BATE COM O INDICE DO ARRAY ELE ENTRA NESSE IF
					if (inicioExclusaoUpperCase == arrayConteudo[1][i])
					{
						// REMOVEMOS O CONTEUDO DO ARRAY NA POSIÇÃO QUE FOI ENCONTADO
						arrayConteudo[0].splice(i + 3,1);
						arrayConteudo[1].splice(i,1);
						
						// PARAMOS O FOR POIS NÃO HA NECESSIDADE DE CONTINUAR UMA VEZ QUE ENCONTRAMOS A PERGUNTA
						break;
					}
					
					// SE O I FOR IGUAL AO TAMANHO DO ARRAY E O IF DE CIMA NÃO ATIVOU QUER DIZER QUE A PERGUNTA NÃO EXISTE
					else if (i == (arrayConteudo[1].length - 1))
					{
						// DAMOS UM ALERT AVISANDO QUE A PERGUNTA DIGITADA NÃO FOI ENCONTRADA
						$("#warning").text("");
						$("#warning").append("Pergunta não encontrada");
						$("#warning").css("display","block");
						
						// PARAMOS O SCRIPT POIS NÃO QUEREMOS QUE ELE CONTINUE
						return 0;
					}
				}
				
				// LIMPAMOS A DIV BASE NO HTML
				$('#base').text("");
				
				// RODAMOS UM FOR PARA ADICIONARMOS NOVAMENTE O TITULO, DESCRIÇÃO E AS PERGUNTAS QUE FICARAM NO ARRAY
				for (var i = 1; i < arrayConteudo[0].length; i++)
				{
					// ADICIONAMOS O CONTEUDO DE CADA INDICE
					$("#base").append(arrayConteudo[0][i]);
				}
			}
		}	
	});	
	
	// AQUI TEMOS A FUNÇÃO QUE FUNCIONA COM OS INPUTS DO TIPO RADIO E CHECKBOX. SEMPRE QUE O USUARIO CLICAR NO BUTTON DE + ELE ADICIONA 1 TIPO DE RESPOSTA
	$(document).on('click', '#adicionarOpc', function(){

		// TRANSFORMA O VALOR DA VARIAVEL PERGUNTA EM UPPERCASE
		var perguntaUpperCase = $('#pergunta').val().toUpperCase();
		
		// ADICIONA A NOVA RESPOSTA NO ARRAYOPC E UTILIZAMOS O arrayConteudo[2].length PARA NAO SOBRESCREVER OS VALORES, ACHO QUE AQUI PODEMOS UTILIZAR O LENGTH + 1, MAS TO COM PREGUIÇA DE MEXER
		arrayConteudo[2][arrayConteudo[2].length] =	"<input type='"+ tipoInput +"' name='"+ tipoInput + perguntaUpperCase + "' value='' disabled='true'>" +
													"<input type='text' id='respostaOpc" + arrayConteudo[2].length + "' name='respostaOpc" + arrayConteudo[2].length + "' placeholder='Digite o valor'>  " +
													"<input type='button' name='removerOpc' id='removerOpc' title='Exclui uma resposta adicionada' value='EXCLUIR' onclick='pegaValor("+ arrayConteudo[2].length +")'>";

		// ADICIONAMOS NA DIV DE OPÇÕES A NOVA PERGUNTA	
		$("#divOpc").append(arrayConteudo[2][arrayConteudo[2].length - 1] + pularLinha);		
	});
	
	// AQUI TEMOS A FUNÇÃO QUE FUNCIONA COM OS INPUTS DO TIPO RADIO E CHECKBOX. SEMPRE QUE O USUARIO CLICAR NO BUTTON DE - ELE REMOVE A ULTIMA RESPOSTA ADICIONADA, ELA É BEM FRACA COMPARADA A OUTRA. MAS TO COM PREGUIÇA.
	$(document).on('click', '#removerOpc', function(){
			
		// TRANSFORMA O VALOR DA VARIAVEL PERGUNTA EM UPPERCASE
		var perguntaUpperCase = $('#pergunta').val().toUpperCase();
		
		// FAÇO UM FOR PARA PEGARMOS OS VALORES CASO O USUARIO TENHA DIGITADO, DE TODAS AS PERGUNTAS
		for (var i = 0; i < arrayConteudo[2].length; i++)
		{					
			// TRANSFORMA EM UPPERCASE O VALOR RECEBIDO PARA PADRONIZAR
			var recebeOpcUpperCase = $("#respostaOpc" + i + "").val().toUpperCase();
			
			// COMO QUEREMOS APAGAR A PERGUNTA X NOS SOBRESCREVEMOS AO INDICE ANTERIOR FAZENDO COM QUE TENHAMOS NO FINAL 2 RESPOSTAS REPETIDAS E RETIRANDO A RESPOSTA QUE FOI PEDIDA A EXCLUSAO	
			if(i > valorObj)
			{
				// VARIAVEL PARA PEGAR O INDICE ANTERIOR
				var novoI = i - 1;
				
				// ARRAYOPC RECEBE ESSE VALOR SOQ NO INDICE ANTERIOR DO I
				arrayConteudo[2][novoI] =	"<input type='"+ tipoInput +"' name='"+ tipoInput + perguntaUpperCase + "' value='' disabled='true'>" +
											"<input type='text' id='respostaOpc" + novoI + "' name='respostaOpc" + novoI + "' value='"+ recebeOpcUpperCase +"'>" +
											"<input type='button' name='removerOpc' id='removerOpc' title='Exclui uma resposta adicionada' value='EXCLUIR' onclick='pegaValor("+ novoI +")'>";
			}
			
			else
			{
				// ADICIONAMOS NO ARRAYOPC O VALOR QUE FOI DIGITADO PARA NÃO SER PERDIDO SEMPRE QUE APAGAR UMA PERGUNTA
				arrayConteudo[2][i] =	"<input type='"+ tipoInput +"' name='"+ tipoInput + perguntaUpperCase + "' value='' disabled='true'>" +
										"<input type='text' id='respostaOpc" + i + "' name='respostaOpc" + i + "' value='"+ recebeOpcUpperCase +"'>" +
										"<input type='button' name='removerOpc' id='removerOpc' title='Exclui uma resposta adicionada' value='EXCLUIR' onclick='pegaValor("+ i +")'>";
			}								
		}

		// COMO TEMOS AS 2 ULTIMAS POSIÇÕES IGUAIS REMOVEMOS ELA
		arrayConteudo[2].splice(arrayConteudo[2].length - 1, 1);		

		// LIMPAMOS A DIV DE OPÇÕES
		$('#divOpc').text("");
			
		// RODAMOS UM FOR PARA AS RESPOSTAS QUE FICARAM NO ARRAY	
		for (var i = 0; i < arrayConteudo[2].length; i++)
		{
			// ADICIONAMOS O CONTEUDO DE CADA INDICE
			$("#divOpc").append(arrayConteudo[2][i] + pularLinha);
		}	
	});
	
	// FUNÇÃO QUE É ATIVADA QUANDO O USUARIO QUER FINALIZAR AS PERGUNTAS DO TIPO CHECKBOX E RADIO
	$("#finalizarOpc").click(function(){
		
		// RETIRAMOS A DIV DE ALERT CASO ELA ESTEJA VISIVEL
		$("#warning").css("display","none");
		
		// CASO ARRAYOPC TENHA TAMANHO 1 QUER DIZER QUE SO TEMOS 1 OPÇÃO E ESSE TIPO DE PERGUNTA PRECISA DE NO MINIMO 2
		if(arrayConteudo[2].length <= 1)
		{
			// DAMOS UM ALERT PARA AVISAR AO USUARIO
			$("#warning").text("");
			$("#warning").append("É necessário ter pelo menos 2 respostas");
			$("#warning").css("display","block");
			
			// RETORNAMOS 0 PARA FINALIZAR O SCRIPT
			return 0;
		}
		
		// SE TIVER TUDO OK ENTRAMOS NO ELSE
		else	
		{
			// TRANSFORMA O VALOR DA VARIAVEL PERGUNTA EM UPPERCASE
			var perguntaUpperCase = $('#pergunta').val().toUpperCase();	
			
			// FOR PARA PEGAR TODAS AS RESPOSTAS DO ARRAYOPC E JUNTAR EM UM UNICO LUGAR
			for (var i = 0; i < arrayConteudo[2].length; i++)
			{

				// TRANSFORMAMOS A RESPOSTA EM UPPERCASE
				var recebeOpcUpperCase = $("#respostaOpc" + i + "").val().toUpperCase();
				
				// CASO ALGUM RESPOSTA ESTEJA EM BRANCO ATIVAMOS O IF
				if (recebeOpcUpperCase == "")
				{
					// DAMOS UM ALERT PARA O USUARIO, POIS NAO PODEMOS ADICIONAR PERGUNTAS EM BRANCO
					$("#warning").text("");
					$("#warning").append("Por favor, preencha os campos corretamente");
					$("#warning").css("display","block");
					
					// RETORNAMOS 0 POIS NÃO QUEREMOS CONTINUAR O SCRIPT
					return 0;
				}
				
				// SE TIVER TUDO OK ENTRAMOS NO ELSE
				else
				{
					if (tipoInput == "radio")
					{
						// PEGAMOS A POSIÇÃO DO ARRAY E SOBRESCEVEMOS O VALOR DELE PARA UM NOVO QUE ESTA FORMADO E CORRETO
						arrayConteudo[2][i] =	"<input type='"+ tipoInput +"' id='respostas_"+arrayConteudo[1].length+"'" +
												"name='respostas_"+arrayConteudo[1].length+"' value='"+ recebeOpcUpperCase +"' >" + recebeOpcUpperCase +"<br>";
					}
					
					else if (tipoInput == "checkbox")
					{
						arrayConteudo[2][i] =	"<input type='"+ tipoInput +"' id='check[]'" +
												"name='check[]' value='"+ recebeOpcUpperCase +"' >" + 	recebeOpcUpperCase + "<br>";
												
						quantCheckbox++;
					}		
				}
			}	
		}
		
		// ADICIONAMOS A PERGUNTA DO USUARIO NO ARRAYCONTEUDO
		arrayConteudo[0][arrayConteudo[0].length] =	"<div style='margin-left:15px;'>" +
													"<label>" + perguntaUpperCase + " </label><br>";

		// INICIAMOS UM FOR PARA ADICIONARMOS TODAS AS OPÇÕES NO ARRAY COM UM += PEGANDO O VALOR ANTIGO E ADICIONANDO O NOVO E NUNCA PERDENDO							
		for (var i = 0; i < arrayConteudo[2].length; i++)
		{
			// A CADA INDICE ELE PEGA O VALOR ANTIGO E ADICIONA O NOVO
			arrayConteudo[0][arrayConteudo[0].length - 1] += arrayConteudo[2][i];
		}
		
		// ADICIONAMOS O VALOR DA PERGUNTA NO ARRAYPERGUNTA
		arrayConteudo[1][arrayConteudo[1].length] = perguntaUpperCase;
		
		// FECHAMOS A DIV DA PERGUNTA E DAMOS UMA QUEBRA DE LINHA
		arrayConteudo[0][arrayConteudo[0].length - 1] += "</div><br>";
		
		// ADICIONAMOS NA DIV BASE O CONTEUDO COMPLETO E CORRETO
		$("#base").append(arrayConteudo[0][arrayConteudo[0].length - 1]);
		
		// PEGAMOS O ARRAYOPC E ZERAMOS ELE, POIS ELE SEMPRE É USADO PARA OS TIPOS RADIO E CHECKBOX, ASSIM NAO É NECESSARIO CRIAR 2 TIPOS PARA ELES E UTILIZAMOS O MESMO
		arrayConteudo[2].splice(0, arrayConteudo[2].length);
	
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
		
		// RETIRAMOS A DIV DE ALERT CASO ELA ESTEJA VISIVEL
		$("#warning").css("display","none");
		
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
		
		// RETIRAMOS A DIV DE ALERT CASO ELA ESTEJA VISIVEL
		$("#warning").css("display","none");
		
		// PEGAMOS O VALOR DO TITULO
		var form_titulo = $("#titulo").val();
		
		// PEGAMOS O VALOR DA DESCRIÇÃO
		var verificaDescricao = $("#descricao").val();
		
		// SE ARRAYCONTEUDO FOR 3 OU TITULO OU DESCRICAO OU ESTIVER VAZIO NÃO PODEMOS ENVIAR O FORMULARIO POIS ESTA VAZIO
		if (arrayConteudo[0].length == 3 || form_titulo == "" || verificaDescricao == "")
		{
			// AVISAMOS QUE O FORMULARIO ESTA INCOMPLETO
			$("#warning").text("");
			$("#warning").append("Formulário incompleto");
			$("#warning").css("display","block");
		}
		
		// SE TIVER TUDO OK VAMOS PARA O ELSE
		else
		{	
			data = new Date();
			
            dia = data.getDate();
			
			ano = data.getFullYear();
			
			hora = data.getHours();
			
			min = data.getMinutes();
			
			mes = data.getMonth() + 1;
			
			var form_time = dia + "/" +  mes + "/" + ano + ", às: " + hora + " Horas " + min + " Minuto(s)";
			
			var arrayToString = arrayConteudo[0].join("|");
			
			var form_conteudo = arrayToString + "</div></form></div>";
			
			var form_questoes = JSON.stringify(arrayConteudo[1]);
			
			var form_Qquestoes = arrayConteudo[1].length;
			
			
			var dadosajax = {
				
				form_id : 0,
				
				form_titulo : form_titulo,
				
				form_conteudo : form_conteudo,
				
				form_questoes : form_questoes,
				
				form_Qquestoes : form_Qquestoes,
				
				form_time : form_time
			}
			
			$.ajax({
				
				type: 'POST',
				
				url: 'recebeForm.php',
				
				data: dadosajax,
				
				dataType : 'html', 
				
				success: function(sucess)
				{
					if(sucess == "1")
					{
						alert("Cadastrado Com Sucesso");
						
						window.location="menu-usuario.php"; 
					}
					else	
					{
						alert("Ocorreu um erro, por favor entre em contato com o administrador");
						
						window.location="menu-usuario.php"; 
					}
				},
				
				error: function(XMLHttpRequest, textStatus, errorThrown) 
				{ 
					alert("Status: " + textStatus + " " + "Error: " + errorThrown); 
                }  		
			});
		}
	});	
});

function pegaValor(valor) {
    valorObj = valor;
}