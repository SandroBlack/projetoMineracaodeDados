<?php
	include_once("db/conexao.php");
	@$idP = $_GET["idP"]; // ID DAS PERGUNTAS ARMAZENADAS NO BANCO, DEPOIS A VARIÁVEL RECEBERÁ ID VIA GET

	// BUSCAR OS DADOS NO BANCO
	$pdo = conectar();
	$sql = "SELECT question_text FROM questions WHERE question_id = ?";
	$listar = $pdo->prepare($sql);
	$listar->execute(array($idP));
	$res = $listar->fetch(PDO::FETCH_ASSOC);
	
?>

<!DOCTYPE html lang="pt-br">

<html>
	<head>
		<title>Formulários Facima</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/inicial.css">
		<link rel="icon" href="img/icon.png">
	</head>

	<body>
		<!-- ======== Cabeçalho ========== -->
		<header id="cabecalho">
			<div class="area-logo"><img src="img/Facima.png" class="logo"></div>
		</header><!-- ======== Fim do cabeçalho ==========-->

		<div class="respostas">
			<h1>Resposta da Pesquisa</h1><br>
			<!-- ESCREVE NA TELA AS PERGUNTAS -->
			<?php echo $res["question_text"];?>

			<a href=""><button class="botao btnAcessar">Responder</button></a>

		</div>

	</body>
</html>