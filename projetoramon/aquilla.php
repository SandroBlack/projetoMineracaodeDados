<?php //include_once("conf/restricao.php");?>

<!DOCTYPE html>
<html lang="pt-br">
	
	<head>
	
		<title>Formulários</title>

		<meta charset="utf-8">

		<link rel="stylesheet" href="css/formularios.css">
		
		<link rel="icon" href="img/icon.png">


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		<script src="js/js-aquilla.js"></script>
		
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