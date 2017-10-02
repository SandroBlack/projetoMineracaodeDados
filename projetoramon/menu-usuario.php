<?php include_once("conf/restricao.php");?>

<!DOCTYPE html lang="pt-br">
<html>

<head>
	<title>Formulários Facima</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/menu-usuario.css">
	<link rel="icon" href="img/icon.png">
</head>

<body>
	<!-- ======== Cabeçalho ========== -->
	<div id="cabecalho">
		<div class="area-logo"><img src="img/Facima.png" class="logo"></div>
		<div id="bemVindo">
			<p>Bem Vindo(a): "Usuário"</p>
		</div>
		<form name="formSair" method="POST" action="">
			<input type="hidden"name="acao" value="">	
			<button class="botao btnSair" title="" onclick="document.formSair.acao.value='sair'">Sair</button>
		</form>
	</div><!-- ======== Fim do cabeçalho ==========-->
	<?php
	@$opcao = $_POST["acao"]; 
		if($opcao == "sair"){
			session_start();
			unset($_SESSION["logado"]);
			header("location:cadastro.php");
		}
	?>
	<div class="area-principal">
		<div class="area-formulario">
			<table id="tbUsuario" cellspacing="30">
				<tr>
					<td class="transparente">
						<p>Total de Pesquisas</p><br>
						<span>0</span>
					</td>
					<td class="transparente">
						<p>Pesquisas Respondidas</p><br>
						<span>0</span>
					</td>
					<td class="transparente">
						<a href="">Consultar Pesquisas</a><br>								
					</td>
				</tr>
				<tr>
					<td class="transparente">
						<a href="">Editar Pesquisas</a>						
					</td>
					<td class="transparente">
						<a href="">Excluir Pesquisas</a>
					</td>
					<td class="transparente">
					<a href="">Estatísticas</a>
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					
				</tr>				
			</table>
			<a href="formulario.php"><button class=" botao btTabela" title="Crie uma nova pesquisa">Criar Nova Pesquisa</button></a>
		</div>
		
	</div>
	
</body>

</html>