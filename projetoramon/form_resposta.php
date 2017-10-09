<?php
	include_once("db/conexao.php");
	
	@$idP = $_GET["idP"]; // ID DAS PERGUNTAS ARMAZENADAS NO BANCO, DEPOIS A VARIÁVEL RECEBERÁ ID VIA GET
	
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
		
		<meta charset="utf-8" />
		
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
		
			@$responderForm = $_POST["responderForm"];
			
			$quantidadeQuestoes = $res["form_questoes"];
			
			function responder($questoes){
			
			$respostas_0 = null;	
			$respostas_1 = null;	
			$respostas_2 = null;	
			$respostas_3 = null;	
			$respostas_4 = null;	
			$respostas_5 = null;	
			$respostas_6 = null;	
			$respostas_7 = null;	
			$respostas_8 = null;	
			$respostas_9 = null;
				
				for ($i = 0; $i < $questoes; $i++) 
				{
					if ($i < $questoes)
					{
						if ($i == 0)
						{
							$respostas_0 = $_POST["respostas_0"];
						}
						
						if ($i == 1)
						{
							$respostas_1 = $_POST["respostas_1"];
						}
						
						if ($i == 2)
						{
							$respostas_2 = $_POST["respostas_2"];
						}
						
						if ($i == 3)
						{
							$respostas_3 = $_POST["respostas_3"];
						}
						
						if ($i == 4)
						{
							$respostas_4 = $_POST["respostas_4"];
						}
						
						if ($i == 5)
						{
							$respostas_5 = $_POST["respostas_5"];
						}
						
						if ($i == 6)
						{
							$respostas_6 = $_POST["respostas_6"];
						}
						
						if ($i == 7)
						{
							$respostas_7 = $_POST["respostas_7"];
						}
						
						if ($i == 8)
						{
							$respostas_8 = $_POST["respostas_8"];
						}	

						if ($i == 9)
						{
							$respostas_9 = $_POST["respostas_9"];
						}						
					}	
				}
			try
			{
				$pdo = conectar();								
				$sql = "INSERT INTO respostas(respostas_id, respostas_0, respostas_1, respostas_2, respostas_3, respostas_4, respostas_5, respostas_6, respostas_7, respostas_8, respostas_9) VALUES(:respostas_id, :respostas_0, 	:respostas_1, :respostas_2, :respostas_3, :respostas_4, :respostas_5, :respostas_6, :respostas_7, :respostas_8, :respostas_9)";
				$inserir = $pdo->prepare($sql);
				$inserir->bindValue(":respostas_id", 0);
				$inserir->bindValue(":respostas_0", $respostas_0);
				$inserir->bindValue(":respostas_1", $respostas_1);
				$inserir->bindValue(":respostas_2", $respostas_2);
				$inserir->bindValue(":respostas_3", $respostas_3);
				$inserir->bindValue(":respostas_4", $respostas_4);
				$inserir->bindValue(":respostas_5", $respostas_5);
				$inserir->bindValue(":respostas_6", $respostas_6);
				$inserir->bindValue(":respostas_7", $respostas_7);
				$inserir->bindValue(":respostas_8", $respostas_8);
				$inserir->bindValue(":respostas_9", $respostas_9);
				$inserir->execute();
			} 
			catch(PDOException $e)
			{
				echo "Erro: " . $e->getMessage() . "<br>";
			}		
		}
			
				if($responderForm == "enviarResposta")
			{
				responder($quantidadeQuestoes);
			}
		?>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		<script>
		
		$(document).ready(function(){
			
				
			$('#responder').click(function(){
				
				$('#responderForm').val("enviarResposta");	
				
				$('#formResposta').submit();				
			});				
		});
		
		</script>
		
	</body>
</html>