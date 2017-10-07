<?php include_once("conf/restricao.php");?>

<!DOCTYPE html>

<html lang="pt-br">

	<head>
		<!-- ========== Título ============ -->
		<title>Formulários</title>

		<!-- ========== Metas ============ -->
		<meta charset="utf-8">

		<!-- ========== Links ============ -->
		<link rel="stylesheet" href="css/formularios.css">
		
		<link rel="icon" href="img/icon.png">

		<!-- ========== Scripts ============ -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		<script src="js/sistema.js"></script>    
		
	</head>


	<body>

		<!-- ======== Cabeçalho ========== -->
		<header id="cabecalho">
		
			<a href="menu-usuario.php"><img src="img/fddsdsadsa.png" style="width: 40px;height: 40px;margin: 14px 0px 0px 20px;" title="Volte a página do usuário"></a>
			
			<button class="botao btnEnviar" id="enviar" name="enviar">Enviar</button>
			
		</header><!-- ======== Fim do cabeçalho ==========-->

		<!-- ====== container ====== -->
		<div id="meio" class="container">

			<div class="area" align="center"><br>
			
				<h1>Seu formulário</h1><br>
				
			</div>

			<!-- ============== Campo de Título ===============-->
			<form class="titulo" >
			
				<input type="text" name="titulo" id="titulo" placeholder="Título do formulário" maxlength="30"><br><br>
				
				<input type="text" name="descricao" id="descricao" placeholder="Descrição do formulário" maxlength="30"><br><br> 
				
			</form>
			
			<br>
			
			<br>

			<!-- ============== Campo de resposta ===============-->
			<div class="questoes" id="divPergunta">
				
				<input type="text" name="pergunta" id="pergunta" placeholder="Pergunta">
					
				<select name="selecionar" id="selecionar">
					
					<option id="1" name="1" value="1">Tipo de resposta</option>
					
					<option id="2" name="2" value="2">Campo de texto</option>
					
					<option id="3" name="3" value="3">Multipla escolha</option>
					
					<option id="4" name="4" value="4">Caixas de Seleção</option>
					
					<option id="5" name="5" value="5">Campo para Data</option>
					
					<option id="6" name="6" value="6">Campo para E-mail</option>
				
				</select>
					
				<br>
				
			</div>
			
			<div class="questoes" id="divOpc">
				
			</div>
			
			<div class="questoes" id="divAdicionarOpc">
				
				<input type="button" name="adicionarOpc" id="adicionarOpc" title="Adicionar mais uma pergunta" value="   +   ">
				
				<input type="button" name="removerOpc" id="removerOpc" title="Exclui uma pergunta adicionada" value="   -   ">
				
				<br>
				
				<br>
				
			</div>

			<div class="barra-inferior" id="menu">
			
				<div class="area-botoes">
				
					<img src="img/Defult Text.png" class="dublicar" id="duplicar" title="adicionar uma pergunta">      
					
					<img src="img/delete_remove_bin_icon-icons.com_72400.png" class="excluir" id="exclusao" title="excluir uma pergunta adicionada">
					
				</div>
				
			</div><!-- Fim da barra inferior -->
			
			<div class="barra-inferior" id="menuOpc">
			
				<div class="area-botoes">
				
					<img src="img/Defult Text.png" class="dublicar" id="finalizarOpc" title="Finalizar uma pergunta">  
					
					<img src="img/delete_remove_bin_icon-icons.com_72400.png" class="excluir" id="descartarOpc" title="Descartar a pergunta adicionada">
					
				</div>
				
			</div>
			





		</div><!-- Fim do container -->

		<div id="base" class="container">
		
		</div>		
		
			<div id="escondido">	
			
				<form name="EnviarFormulario" id="EnviarFormulario" method="post" action="recebeForm.php">
				
					<input name="FormularioCompleto" id="FormularioCompleto" type="hidden" value="">
					
				</form>
				
			</div>
			
		<br>
		
		<br>
		
		<br>
		
		<br>
		
	</body>

</html>