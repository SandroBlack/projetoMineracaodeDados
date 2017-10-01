<?php 
include_once("db/conexao.php");

	/*$recebe = $_POST["FormularioCompleto"];
	$recebeX = str_replace('|', ' ', $recebe);

	$arq = fopen("teste.txt", "a+");
	fwrite($arq, $recebeX);
	fclose($arq);
	header("location:menu-usuario.php");*/

	$recebe = $_POST["Valores"];
	$recebeX = str_replace('|', ' ', $recebe);
	$cod = rand();
	$codP = base64_encode($cod); 

	if($recebeX == ""){
		return false;
		header("location:menu-usuario.php");	
	} else{
		try{
			$pdo = conectar();
			$sql = "INSERT INTO questions(question_text, question_cod) VALUES(:perguntas, :codPerguntas)";
			$insert = $pdo->prepare($sql);					
			$insert->bindValue(":perguntas", $recebeX);
			$insert->bindValue(":codPerguntas", $codP);
			$insert->execute();
		} catch(PDOException $e){
				echo "Erro: " . $e->getMessage();
		  }
	  }
	  header("location:menu-usuario.php");	
?>