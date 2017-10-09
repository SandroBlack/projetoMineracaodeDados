<?php include_once("conf/restricao.php");
      include_once("db/conexao.php"); 
?>

<!DOCTYPE html>

<html  lang="pt-br">

<head>
	<title>Consulta</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/consulta.css">
	<link rel="icon" href="img/icon.png">
</head>

<body>
	<!-- ======== Cabeçalho ========== -->
	<header id="cabecalho">

		<a href="menu-usuario.php">

			<img src="img/fddsdsadsa.png" style="width: 40px;height: 40px;margin: 14px 0px 0px 20px;" title="Volte ao menu do usuário">

		</a>

	</header><!-- ======== Fim do cabeçalho ==========-->


	<div class="container">	
		<?php

			/*try{
				$pdo = conectar();								
				$sql = "SELECT * FROM forms WHERE form_user=?";
				$listar = $pdo->prepare($sql);								
				$listar->execute(array($_SESSION["userId"]));
				$res = $listar->fetch(PDO::FETCH_ASSOC);
				$linha = $listar->rowCount();
						
			} catch(PDOException $e){
					echo "Erro: " . $e->getMessage() . "<br>";
			}*/		
		?>

		<h1 style="text-align: center;">Seus Formulários</h1><br><br>
		
		<table style="width: 810px;margin: 10px auto 0px auto;" cellspacing="10" >

			<tr>
				<th style="width: 270px;text-align: center;">Título</th>
				<th style="width: 270px;text-align: center;">Descrição</th>
				<th style="width: 270px;text-align: center;">Data</th>
			</tr>

			<tr>
				<?php
					/*while($linha > 0){
						echo "<td>{$res['form_title']}</td>";
						echo "<td>{$res['form_desc']}</td>";
						echo "<td>{$res['form_time']}</td>";					
						$linha --;	 
					}*/	 
				?>			
			</tr>
			
		</table>

	</div>

</body>


</html>