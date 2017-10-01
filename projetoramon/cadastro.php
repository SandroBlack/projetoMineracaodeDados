<?php 
	include_once("db/conexao.php");	
	@$acao = $_POST["acao"];
?>

<!DOCTYPE html>

<html  lang="pt-br">

<head>
	<title>Cadastro ou Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="icon" href="img/icon.png">
</head>

<body>
	<!-- ======== Cabeçalho ========== -->
	<header id="cabecalho">
		<div class="area-logo"><img src="img/Facima.png" class="logo"></div>
	</header>
	<!-- ======== Fim do cabeçalho ==========-->

	<div class="area">

		<!-- ================= Fim do Bloco do login =================== -->
		<div class="login">
			<h1 align="center">Login</h1><br>

			<form name="formLogin" class="forms" method="POST" action="">
				<input type="hidden" name="acao" value="">
				<label for="email">E-mail:</label><br>
					<input type="text" name="email" id="email_login" maxlength="50" placeholder="Digite seu nome"><br><br>

				<label for="senha">Senha:</label><br>
					<input type="password" name="senha" id="senha_login" minlength="6" placeholder="Digite sua senha"><br><br>
					<a href="recuperar.php" align="center">Esqueceu a Senha?</a><br><br>
					<input type="submit" name="login" class="botao" value="ENTRAR" onclick="document.formLogin.acao.value='login'">
			</form>
		</div><!-- ================= Fim do Bloco do login =================== -->

		<!-- ================= Bloco do cadastro =================== -->
		<div class="cadastrar">

			<h1 align="center"> Cadastre-se </h1><br>
			
			<form name="formCadastro" class="forms" method="POST" action="">
				<input type="hidden" name="acao" value="">
				<label for="nome-cadastro">Nome:</label><br>
				<input type="text" name="nome" id="nome_cadastro" placeholder=" Ex.: José Gomes da Silva" maxlength="50"><br><br>

				<label for="email">E-mail:</label><br>
				<input type="email" name="email" id="email" placeholder=" Ex.: jose_gomes@hotmail.com" maxlength="30"><br><br>

				<label for="senha-cadastro">Senha:</label><br>
				<input type="password" name="senha" id="senha_cadastro" placeholder=" No mínimo 6 caracteres" minlength="6"><br><br>

				<label for="confirma-senha">Confirme a senha:</label><br>
				<input type="password" name="confSenha" id="conf_senha" placeholder=" Digite novamente a senha" minlength="6"><br><br><br>

				<div class="area-botao"><input type="submit" name="cadastrar" class="botao" value="CADASTRAR" onclick="document.formCadastro.acao.value = 'cadastro'";></div>
			</form>
		
			<?php 		
				function login(){						
					$email = $_POST["email"];						
					$senha = $_POST["senha"];						

					if($email == "" || $senha == ""){
						echo "<script>alert('Favor Preencher Todos os Campos!')</script>";
						return false;
					} else{
						try{
							$pdo = conectar();								
							$sql = "SELECT * FROM users WHERE user_email=? AND user_password=?";
							$listar = $pdo->prepare($sql);								
							$listar->execute(array($email, $senha));
							$res = $listar->fetch(PDO::FETCH_ASSOC);
							$linha = $listar->rowCount();

							if($linha == 0){
								echo "<script>alert('Usuário ou Senha Inválido!')</script>";
								return false;
							} else{
								session_start();
								$_SESSION["nomeUser"] = $res["user_name"];
								$_SESSION["logado"] = true;
								header("location:menu-usuario.php");
							}						
							
						} catch(PDOException $e){
							echo "Erro: " . $e->getMessage() . "<br>";
						}						

					}
				}

				function cadastrar(){						
					$nome = $_POST["nome"];
					$email = $_POST["email"];
					$senha = $_POST["senha"];
					$confSenha = $_POST["confSenha"];

					if($nome == "" || $email == "" || $senha == "" || $confSenha == ""){
						echo "<script>alert('Favor Preencher Todos os Campos!')</script>";
						return false;
					} else{
						try{
							$pdo = conectar();								
							$sql = "INSERT INTO users(user_name, user_email, user_password) VALUES(:nome, :email, :senha)";
							$inserir = $pdo->prepare($sql);
							$inserir->bindValue(":nome", $nome);
							$inserir->bindValue(":email", $email);
							$inserir->bindValue(":senha", $senha);
							$inserir->execute();
							echo "<script>alert('Cadastro Realizado com Sucesso!')</script>";
							echo "<script>location.href'index.php'</script>";
						} catch(PDOException $e){
							echo "Erro: " . $e->getMessage() . "<br>";
						}						

					}
				}
				if($acao == "cadastro"){
					cadastrar();
				}else if($acao == "login"){
					login();
				}
			?>
		
	</div><!-- ================= Fim Bloco do cadastro =================== -->

</div><!-- ================= Fim da área dos blocos =================== -->
</body>


</html>