<?php include_once("conf/restricao.php");
      include_once("db/conexao.php"); 
?>

<!DOCTYPE html lang="pt-br">
<html>

<head>
	<title>Menu do Usuário</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/menu-usuario.css">
	<link rel="icon" href="img/icon.png">
</head>

<body>
	<?php
	@$opcao = $_POST["acao"]; 
		if($opcao == "sair"){
			session_start();
			unset($_SESSION["logado"]);
			header("location:cadastro.html");
		}
		
		try{
			$pdo = conectar();								
			$sql = "SELECT * FROM forms WHERE user_id=?";
			$listar = $pdo->prepare($sql);								
			$listar->execute(array($_SESSION["userId"]));
			$res = $listar->fetch(PDO::FETCH_ASSOC);
			$linha = $listar->rowCount();					
		} catch(PDOException $e){
					echo "Erro: " . $e->getMessage() . "<br>";
		}

		try{
			$pdo = conectar();								
			$sql = "SELECT * FROM respostas";
			$listar = $pdo->prepare($sql);								
			$listar->execute();			
			$linhaR = $listar->rowCount();					
		} catch(PDOException $e){
					echo "Erro: " . $e->getMessage() . "<br>";
		}		
	?>

	<!-- ======== Cabeçalho ========== -->
	<div id="cabecalho">


		<div id="bemVindo">
			<p>Bem Vindo(a): <?php echo $_SESSION["nomeUser"]?></p>
		</div>


		<form name="formSair" method="POST" action="">
			<input type="hidden"name="acao" value="">	
			<button class="botao" title="" onclick="document.formSair.acao.value='sair'">Sair</button>
		</form>




	</div><!-- ======== Fim do cabeçalho ==========-->
	
	<div class="area-principal">
		<div class="area-formulario">
			<table id="tbUsuario" cellspacing="30">
				<tr>
					<td class="transparente">
						<p>Formulários Criados</p><br>
						<span><?=$linha?></span>
					</td>
					<td class="transparente">
						<p>Respostas Obtidas</p><br>
						<span><?=$linhaR?></span>
					</td>
					<td class="transparente">
						<a href="consulta.php">Consultar Pesquisas</a><br>								
					</td>
				</tr>

				<tr>
					<td></td>
					<td class="transparente">
						<a href="estatistica.php">Estatísticas</a><br>
					</td>
					<td></td>
				</tr>				
			</table>
			<div class="area-btTabela"><a href="formulario.php"><button class="btTabela" title="Crie uma nova pesquisa">Criar Nova Pesquisa</button></a></div>
		</div>
		
	</div>
	
</body>

</html>