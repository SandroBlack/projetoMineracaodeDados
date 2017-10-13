<?php
	include_once("db/conexao.php");
	require ("cria_url.php");
	
 $url = gerarUrl();
?>

<!DOCTYPE html lang="pt-br">

<html>

	<head>
	
		<title>Responder</title>
		
		<meta charset="utf-8" />
		
		<link rel="stylesheet" href="css/form_resposta.css">
		
		<link rel="icon" href="img/icon.png">
		
	</head>

	<body>
	
	<header id="cabecalho">
		
			<button class="botao" id="responder" name="responder"><?php	echo $url ?></button>
			
		</header>
		<!-- ======== Fim do cabeçalho ==========-->
		
			<?php 
			
				echo $url
			?>
	</body>
</html>