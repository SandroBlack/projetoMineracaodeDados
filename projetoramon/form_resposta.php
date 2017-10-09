<?php
	include_once("db/conexao.php");
	@$idP = $_GET["idP"]; // ID DAS PERGUNTAS ARMAZENADAS NO BANCO, DEPOIS A VARIÁVEL RECEBERÁ ID VIA GET
	
	@$responderForm = $_POST["responderForm"];
	
	// BUSCAR OS DADOS NO BANCO
	$pdo = conectar();
	$sql = "SELECT * FROM forms WHERE form_id = ?";
	$listar = $pdo->prepare($sql);
	$listar->execute(array($idP));
	$res = $listar->fetch(PDO::FETCH_ASSOC);
	
?>

<!DOCTYPE html lang="pt-br">

<html>

	<head>
	
		<title>Responder</title>
		
		<meta charset="utf-8">
		
		<link rel="stylesheet" href="css/form_resposta.css">
		
		<link rel="icon" href="img/icon.png">
		
	</head>

	<body>
	
	<header id="cabecalho">
		
			<button class="botao" id="responder" name="responder">Responder</button>
			
		</header>
		<!-- ======== Fim do cabeçalho ==========-->
		
			<?php 
			
				echo $res["form_conteudo"];
			?>
			
		<!--<div class="container">
		
			

			 <h1 style="text-align: center;">Título</h1>
			<h4 style="text-align: center;">Descrição</h3><br><br>
			<form style="padding: 20px 0px 0px 20px;">
				<label>Pergunta 1</label><br><br>
				<input type="text" name=""><br><br>

				<label>Pergunta 2</label><br><br>
				<input type="checkbox" name=""><br><br>

				<label>Pergunta 3</label><br><br>
				<input type="radio" name=""><br><br>

				<label>Pergunta 4</label><br><br>
				<select>
					<option>opção 1</option>
					<option>opção 2</option>
				</select><br><br>

				<label>Pergunta 5</label><br><br>
				<input type="date" name=""><br><br>

				<label>Pergunta 6</label><br><br>
				<input type="email" name=""><br><br>

				<label>Pergunta 7</label><br><br>
				<input type="text" name=""><br><br>

				<label>Pergunta 8</label><br><br>
				<input type="checkbox" name=""><br><br>

				<label>Pergunta 9</label><br><br>
				<input type="radio" name=""><br><br>

				<label>Pergunta 10</label><br><br>
				<input type="text" name=""><br><br>
			</form> 

		</div>-->

		
		<?php 
			function responder(){
				echo "EAE";
			}
			
				if($responderForm == "enviarResposta")
			{
				responder();
			}
			
			echo $responderForm;
		?>
			
	</body>
</html>