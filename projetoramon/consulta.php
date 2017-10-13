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

		<a href="menu-usuario.php">&larr; Voltar</a>

	</header><!-- ======== Fim do cabeçalho ==========-->


	<div class="container">	
		<?php

			try{
				$pdo = conectar();								
				$sql = "SELECT forms.form_titulo, forms.form_time, link.link_conteudo 
						FROM forms 
						INNER JOIN link ON forms.form_id = link.form_id
						WHERE user_id=?";
				$listar = $pdo->prepare($sql);								
				$listar->execute(array($_SESSION["userId"]));
				//$res = $listar->fetch(PDO::FETCH_ASSOC);
				//$linha = $listar->rowCount();
						
			} catch(PDOException $e){
					echo "Erro: " . $e->getMessage() . "<br>";
			}	
		?>

		<h1 style="text-align: center;">Seus Formulários</h1><br><br>
		
		<table style="width: 810px;margin: 10px auto 0px auto;" cellspacing="10" >

			<tr>
				<th style="width: 270px;text-align: center;">Título</th>
				<th style="width: 270px;text-align: center;">Criado em:</th>
			</tr>
			
				<?php
					while($res = $listar->fetch(PDO::FETCH_ASSOC)){
						echo "</tr>";
						echo "<td align='center'><a href='http://localhost/projetoMineracaodeDados/projetoramon/form_resposta.php?link_conteudo={$res['link_conteudo']}' target='_blank'> {$res['form_titulo']}</a></td>";
						echo "<td>{$res['form_time']}</td>";						
						echo "<td>{$res['link_conteudo']}</td>";
						echo "</tr>";	 
					}	 
				?>			
			
		</table>

	</div>

</body>


</html>