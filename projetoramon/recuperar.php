<?php include_once("db/conexao.php");?>

<!DOCTYPE html lang="pt-br">

<html>
	<head>
		<title>Recuperar Senha</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/recuperar.css">
		<link rel="icon" href="img/icon.png">
	</head>

	<body>
		<!-- ======== Cabeçalho ========== -->
		<header id="cabecalho">
			<a href="cadastro.php"><img src="img/fddsdsadsa.png" style="width: 40px;height: 40px;margin: 14px 0px 0px 20px;" title="Volte a página de cadastro"></a>			
		</header><!-- ======== Fim do cabeçalho ==========-->

		<div class="frase fraseRec">
			<h2>ESQUECEU A SENHA?</h2><br>
			<p>Nos Informe o seu E-mail de Cadastro para que Seja Enviado os Dados para Recuperação</p><br>
			<form name="formRec" method="POST" action="">
				<input type="hidden" name="acao" value="">
				<input type="text" name="email" id="email" class="texto" placeholder="                Informe o E-mail Cadastrado" maxlength="34" size="40"/><br><br>
				<a href=""><button class="botao btnEnviarEmail" onclick="document.formRec.acao.value='enviarEmail'">Enviar</button></a>
			</form>
		</div>
	<?php 	
	
		@$acao = $_POST["acao"];
		if($acao == "enviarEmail"){
			emailRecSenha();;
		}
		
		function emailRecSenha(){
			require("gerar-senha.php");
			require("envio-email-senha-temp.php");
			
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
						$senhaTemporaria = geraSenha(10, true, true, true);
						
						try{
							$pdo = conectar();	
							
							$sql = "UPDATE users SET user_password_temp = :senhaTemporaria WHERE user_email = :email";
							
							$inserir = $pdo->prepare($sql);
							
							$inserir->bindValue(":senhaTemporaria", $senhaTemporaria);
							
							$inserir->bindValue(":email", $email);
							
							$inserir->execute();
							
						} catch(PDOException $e){
							
							echo "Erro: " . $e->getMessage() . "<br>";
						}
					$enviarEmail = enviarEmail($email, $senhaTemporaria);	
					}
				} catch(PDOException $e){
					echo "Erro: " . $e->getMessage() . "<br>";
				}
			}
		header("Location:cadastro.php");		
		}		
	?>
	</body>
</html>
