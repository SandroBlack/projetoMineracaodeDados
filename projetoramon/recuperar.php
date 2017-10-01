<?php //include_once("db/conexao.php");?>

<!DOCTYPE html lang="pt-br">

<html>
	<head>
		<title>Recuperar Senha</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/inicial.css">
		<link rel="icon" href="img/icon.png">
	</head>

	<body>
		<!-- ======== Cabeçalho ========== -->
		<header id="cabecalho">
			<a href="cadastro.php"><button class="botao btnLogin" title="">Login/Cadastro</button></a>			
		</header><!-- ======== Fim do cabeçalho ==========-->

		<div class="frase fraseRec">
			<h2>ESQUECEU A SENHA?</h2><br>
			<p>Nos Informe o seu E-mail de Cadastro para que Seja Enviado os Dados para Recuperação</p><br>
			<form name="formRec" method="" action="">
				<input type="text" name="" class="texto" placeholder="Informe o E-mail Cadastrado." maxlength="30" size="40"/><br><br>
				<a href=""><button class="botao btnEnviarEmail">Enviar</button></a>
			</form>
		</div>

	</body>
</html>
