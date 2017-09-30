<?php //include_once("conf/restricao.php");?>

<!DOCTYPE html>
<html lang="pt-br">

	<head>
	
		<title>Formulários</title>

		<meta charset="utf-8">

		<link rel="stylesheet" href="css/formularios.css">
		
		<link rel="icon" href="img/icon.png">


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		<script>

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
					
					if(arrayConteudo.length == 2)
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
						
						for(var i = 3; i <= arrayPergunta.length; i++)
						{
							if(inicioExclusaoUpperCase == arrayPergunta[i])
							{
								arrayConteudo.splice(i,1);
								
								arrayPergunta.splice(i,1);
								
								break;
							}
						}
						
						$('#base').text("");
						
						for(var i = 0; i < arrayConteudo.length; i++)
						{
							$("#base").append(arrayConteudo[i]);
						}
						
						cont --;
					}	

				});

				$("#enviar").click(function(){
					
					var arrayToString = arrayConteudo.join("|");
					
					var stringCompleto = arrayToString + "</form></div>";
					
					$('#FormularioCompleto').val(stringCompleto);
					
					$('#EnviarFormulario').submit();
					
					//alert("Formulário Cadastrado com Sucesso");

				});
			
			});
			
		</script>
	</head>


	<body>
	
		<header id="cabecalho">
		
			<button class="botao" id="enviar" name="enviar">Enviar</button>
		
		</header>
		
		<div class="container">
		
			<div class="area" align="center"><br>
			
				<h1>Seu formulário</h1><br>
			
			</div>
			
			<form class="titulo" >
			
				<input type="text" name="titulo" id="titulo" placeholder="Título do formulário" maxlength="30"><br><br>
				
				<input type="text" name="descricao" id="descricao" placeholder="Descrição do formulário" maxlength="30" size="90%"><br><br>
			
			</form>
			
			<br>
			
			<br>

			<div class="questoes" id="divPergunta">
			
				<input type="text" name="pergunta" id="pergunta" placeholder="Pergunta">
				
				<select name="selecionar" id="selecionar">
				
				<option id="1" name="1" value="1">Tipo de resposta</option>
				
				<option id="2" name="2" value="2">Campo de texto</option>
				
				<option id="3" name="3" value="3">Multipla escolha</option>
				
				<option id="4" name="4" value="4">Caixas de Seleção</option>
				
				</select>
				
				<br>
			
			</div>
			
			<div class="barra-inferior" id="menu">
			
				<div class="area-botoes">
				
					<img src="img/Defult Text.png" class="dublicar" id="duplicar" title="adicionar uma pergunta">
					
					<img src="img/delete_remove_bin_icon-icons.com_72400.png" class="excluir" id="exclusao" title="excluir uma pergunta adicionada">
				
				</div>
			
			</div>
		
		</div>
		
		<div id="base" class="container area">
		
		</div>
		
		<div id="escondido">
			
			<form name="EnviarFormulario" id="EnviarFormulario" method="post" action="teste.php">
				
				<input name="FormularioCompleto" id="FormularioCompleto" type="hidden" value="">
				
			</form>
		</div>
		
	</body>
	
</html>