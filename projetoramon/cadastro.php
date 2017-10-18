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
		<a href="index.html">&larr; Voltar</a>
	</header>
	<!-- ======== Fim do cabeçalho ==========-->

	<div class="area">

		<!-- ================= Bloco do login =================== -->
		<div class="login">
			<h1 align="center">Login</h1><br>

			<form name="formLogin" class="forms" method="POST" action="">
				<input type="hidden" name="acao" value="">
				<label for="email">E-mail:</label><br>
					<input type="text" name="email" id="email_login" maxlength="50" placeholder="Digite seu nome"><br><br>

				<label for="senha">Senha:</label><br>
					<input type="password" name="senha" id="senha_login" minlength="6" placeholder="Digite sua senha"><br><br>
					<h4 style="text-align:center;" class=""><a href="recuperar.php" >Esqueceu a Senha?</a></h4><br><br>
					<div class="area-botao"><input type="submit" name="login" class="botao" value="ENTRAR" onclick="document.formLogin.acao.value='login'"></div>
			</form>
		</div><!-- ================= Fim do Bloco do login =================== -->

		<!-- ================= Bloco do cadastro =================== -->
		<div class="cadastrar">

			<h1 align="center"> Cadastre-se </h1><br>
			
			<form name="formCadastro" class="forms" method="POST" action="">
				<input type="hidden" name="acao" value="">
				<label for="nome-cadastro">Nome:</label><br>
				<input type="text" name="nome" id="nome_cadastro" placeholder="Ex.: José Gomes da Silva" maxlength="50"><br><br>

				<label for="email">E-mail:</label><br>
				<input type="email" name="email" id="email" placeholder="Ex.: jose_gomes@hotmail.com" maxlength="50"><br><br>

				<label for="senha-cadastro">Senha:</label><br>
				<input type="password" name="senha" id="senha_cadastro" placeholder="De 6 a 10 caracteres" minlength="6" maxlength="10"><br><br>

				<label for="confirma-senha">Confirme a senha:</label><br>
				<input type="password" name="confSenha" id="conf_senha" placeholder="Digite novamente a senha" minlength="6" maxlength="10"><br><br><br>

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
							$sql = "SELECT * FROM users WHERE user_email=?";
							$listar = $pdo->prepare($sql);								
							$listar->execute(array($email));
							$res = $listar->fetch(PDO::FETCH_ASSOC);
							$linha = $listar->rowCount();

							if($linha == 0)
							{
								echo "<script>alert('Usuário ou Senha Inválido!')</script>";
								return false;
							} 
							else
							{
								if($senha == $res["user_password"])
								{	
									session_start();
									$_SESSION["userId"] = $res["user_id"];
									$_SESSION["nomeUser"] = $res["user_name"];
									$_SESSION["logado"] = true;
									header("location:menu-usuario.php");
								}
								else if ($senha == $res["user_password_temp"])
								{
									$_SESSION["userId"] = $res["user_id"];
									$_SESSION["nomeUser"] = $res["user_name"];
									$_SESSION["logado"] = true;
									header("location:redefinir.php");
								}
								else 
								{
									echo "<script>alert('Usuário ou Senha Inválido!')</script>";
									return false;
								}									
							}						
							
						} catch(PDOException $e){
							echo "Erro: " . $e->getMessage() . "<br>";
						}						

					}
				}

				function cadastrar(){						
					$nome = $_POST["nome"];
					$email = $_POST["email"];
					$email = preg_replace('/[^[:alnum:]_.-@]/','',$email);
					$senha = $_POST["senha"];
					$confSenha = $_POST["confSenha"];

					if($nome == "" || $email == "" || $senha == "" || $confSenha == ""){
						echo "<script>alert('Favor Preencher Todos os Campos!')</script>";
						return false;
					} else{
						try{
							$pdo = conectar();								
							$sql = "INSERT INTO users(user_name, user_email, user_password, user_password_temp, user_ativado) VALUES(:nome, :email, :senha, :temp, :ativado)";
							$inserir = $pdo->prepare($sql);
							$inserir->bindValue(":nome", $nome);
							$inserir->bindValue(":email", $email);
							$inserir->bindValue(":senha", $senha);
							$inserir->bindValue(":temp", "");
							$inserir->bindValue(":ativado", 0);
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
