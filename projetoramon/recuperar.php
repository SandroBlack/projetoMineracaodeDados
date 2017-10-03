<?php include_once("db/conexao.php");?>

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
			<form name="formRec" method="POST" action="">
				<input type="hidden" name="acao" value="">
				<input type="text" name="email" id="email" class="texto" placeholder="Informe o E-mail Cadastrado." maxlength="30" size="40"/><br><br>
				<a href=""><button class="botao btnEnviarEmail" onclick="document.formRec.acao.value='enviarEmail'">Enviar</button></a>
			</form>
		</div>
	<?php 		
		@$acao = $_POST["acao"];
		if($acao == "enviarEmail"){
			emailRecSenha();;
		}
		
		function emailRecSenha(){
			$email = $_POST["email"];			
			if($email == ""){
				echo "<script>alert('Favor Informar seu E-mail.')</script>";
				return false;
			} else{
				try{
					$pdo = conectar();
					$sql = "SELECT * FROM users WHERE user_email = ?";						
					$listar = $pdo->prepare($sql);
					$listar->execute(array($email));
					$res = $listar->fetch(PDO::FETCH_ASSOC);
					$linha = $listar->rowCount();					
					if($linha == 0){
						echo "<script>alert('E-mail não Cadastrado!')</script>";
					} else{
						// FUNÇÃO PARA ENVIAR O E-MAIL DE RECUPERAÇÇÃO DE SENHA

						echo "<script>alert('Um link para Reuperação de Senha foi Enviado para seu E-mail')</script>";
					}
				} catch(PDOException $e){
					echo "Erro: " . $e->getMessage() . "<br>";
				}
			}		
		}		
	?>
	</body>
</html>