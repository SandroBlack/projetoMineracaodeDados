<?php 
	include_once("db/conexao.php");

	/*$recebe = $_POST["FormularioCompleto"];
	$recebeX = str_replace('|', ' ', $recebe);

	$arq = fopen("teste.txt", "a+");
	fwrite($arq, $recebeX);
	fclose($arq);
	header("location:menu-usuario.php");*/

	$FormularioCompleto = $_POST["FormularioCompleto"];
	$FormularioCompletoX = str_replace('|', ' ', $FormularioCompleto);
	$cod = rand();
	$codP = base64_encode($cod); 
	$id = 0;
	
	try 
	{
		$pdo = conectar();       
	  	$sql = "INSERT INTO questions VALUES(:questions_id, :question_text, :question_form)";
	  	$query = $pdo->prepare($sql);
		$query->execute(array(
			':questions_id' => $id,
			':question_text' => $FormularioCompletoX,
			':question_form' => "5"
		));	
	} 
	catch(PDOException $e) {

	    echo 'ERROR: ' . $e->getMessage();

	}

	header("location:menu-usuario.php");	
?>