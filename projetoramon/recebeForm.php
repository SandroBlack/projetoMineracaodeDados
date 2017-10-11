<?php 
include_once("db/conexao.php");
include_once("conf/restricao.php");		
	
	$FormularioCompletoQuestoes = $_POST["FormularioCompletoQuestoes"];
	
	$FormularioCompleto = $_POST["FormularioCompleto"];
	
	$FormularioCompletoX = str_replace('|', ' ', $FormularioCompleto);
	
	$FormularioCompletoTitulo = $_POST["FormularioCompletoTitulo"];

	$FormularioCompletoDescricao = $_POST["FormularioCompletoDescricao"];
	
	if($FormularioCompletoX == "")
	{
		
		return false;
		
		header("location:menu-usuario.php");	
		
	}
	
	else
	{
		try
		{
			$pdo = conectar();
			
			$sql = "INSERT INTO forms(form_titulo, form_desc, form_conteudo, form_questoes, user_id) VALUES(:form_titulo, :form_desc, :form_conteudo, :form_questoes, :user_id)";
			
			$insert = $pdo->prepare($sql);			
				
			$insert->bindValue(":form_titulo", $FormularioCompletoTitulo);
			
			$insert->bindValue(":form_desc", $FormularioCompletoDescricao);
			
			$insert->bindValue(":form_conteudo", $FormularioCompletoX);
			
			$insert->bindValue(":form_questoes", $FormularioCompletoQuestoes);

			$insert->bindValue(":user_id", $_SESSION["userId"]);
			
			$insert->execute();
			
		} 
		catch(PDOException $e)
		{
			echo "Erro: " . $e->getMessage();
		}
	}
	
	header("location:menu-usuario.php");
?>