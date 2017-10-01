<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/resposta-usuario.css">
	</head>


	<body>

		<header id="cabecalho">
				
			<button class="botao" id="responder" name="enviar">Responder</button>
				
		</header>

		<div class="container">
		
		<?php
		// MONTAR A PÁGINA COM O CONTEÚDO DO ARQUIVO TXT

			$FormularioCompleto = $_POST["FormularioCompleto"];
			$FormularioCompletoTratado = str_replace("|", " ", $FormularioCompleto);
			
			$arq = fopen("teste.txt", "r+");
			fwrite($arq, $FormularioCompletoTratado);
			fclose($arq);
			
			echo $FormularioCompletoTratado ;
		?>

		</div>
	</body>
</html>