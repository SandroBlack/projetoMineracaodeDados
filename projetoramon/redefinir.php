<?php include_once("conf/restricao.php");
      include_once("db/conexao.php"); 
?>

<!DOCTYPE html lang="pt-br">

<html>
	<head>
		<title>Redefinir Senha</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/redefinir.css">
		<link rel="icon" href="img/icon.png">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/redefinir.js" /></script>
	</head>

	<body>
		<!-- ======== Cabeçalho ========== -->
		<header id="cabecalho">
			
		</header><!-- ======== Fim do cabeçalho ==========-->

		<div style="width: 400px;height: 400px;background: #ffffff;margin: 80px auto 0px auto;border-radius: 8px;">

			<div style="width: 300px;height: auto;margin: 0 auto;padding-top:100px;">

				<h3 style="text-align: center;">Nome do Usuário</h3><br><br>

				<input type="password" id="senha" name="senha" style="width:300px;height: 30px;border-radius: 4px;" placeholder="Digite uma nova senha" minlength="8"><br><br>
				<input type="password" id="confSenha" name="confsenha" style="width:300px;height: 30px;border-radius: 4px;"  placeholder="Confirme a senha" minlength="8"><br><br><br>
				
				<div style="width: 150px;height: 50px;margin: 0px auto;">
				<input type="button" id="redefinirSenha" name="redefinirSenha" class="botao" value="Redefinir">
				</div>
			</div>
		</div>
	</body>
</html>