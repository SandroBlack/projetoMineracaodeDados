<?php 
include_once("db/conexao.php");

include_once("conf/restricao.php");	

require ("cria_url.php");	

	$form_id = $_POST["form_id"];
	
	$form_titulo = $_POST["form_titulo"];
	
	$form_conteudox = $_POST["form_conteudo"];
	
	$form_conteudo = str_replace('|', ' ', $form_conteudox);
	
	$form_questoes = json_decode($_POST["form_questoes"]);
	
	$form_Qquestoes = $_POST["form_Qquestoes"];
	
	$form_time = $_POST["form_time"];
	
	$perguntas_0 = null;	
	
	$perguntas_1 = null;	
	
	$perguntas_2 = null;	
	
	$perguntas_3 = null;	
	
	$perguntas_4 = null;	
	
	$perguntas_5 = null;	
	
	$perguntas_6 = null;	
	
	$perguntas_7 = null;	
	
	$perguntas_8 = null;	
	
	$perguntas_9 = null;	

	$result = count($form_questoes);

	for ($i = 0; $i < $result; $i++) 
	{
		if ($i < $result)
		{
			if ($i == 0)
			{
				$perguntas_0 = $form_questoes[0];
			}
				
			else if ($i == 1)
			{
				$perguntas_1 = $form_questoes[1];
			}
				
			else if ($i == 2)
			{
				$perguntas_2 = $form_questoes[2];
			}
				
			else if ($i == 3)
			{
				$perguntas_3 = $form_questoes[3];
			}
				
			else if ($i == 4)
			{
				$perguntas_4 = $form_questoes[4];
			}
				
			else if ($i == 5)
			{
				$perguntas_5 = $form_questoes[5];
			}
				
			else if ($i == 6)
			{
				$perguntas_6 = $form_questoes[6];
			}
				
			else if ($i == 7)
			{
				$perguntas_7 = $form_questoes[7];
			}
				
			else if ($i == 8)
			{
				$perguntas_8 = $form_questoes[8];
			}	

			else if ($i == 9)
			{
				$perguntas_9 = $form_questoes[9];
			}						
		}	
	}
	
	$formUrl = gerarUrl();

		try
		{
			$pdo = conectar();
			
			$sql = "INSERT INTO forms(form_id, form_titulo, form_conteudo, form_Qquestoes, form_time, user_id) VALUES(:form_id, :form_titulo, :form_conteudo, :form_Qquestoes, :form_time, :user_id)";
			
			$insertZero = $pdo->prepare($sql);			
			
			$insertZero->bindValue(":form_id", $form_id);
			
			$insertZero->bindValue(":form_titulo", $form_titulo);
			
			$insertZero->bindValue(":form_conteudo", $form_conteudo);
			
			$insertZero->bindValue(":form_Qquestoes", $form_Qquestoes);
			
			$insertZero->bindValue(":form_time", $form_time);

			$insertZero->bindValue(":user_id", $_SESSION["userId"]);
			
			$insertZero->execute();
			
			$lastId = $pdo->lastInsertId();
			
			$sql = "INSERT INTO perguntas(pergunta_id, perguntas_0, perguntas_1, perguntas_2, perguntas_3, perguntas_4, perguntas_5, perguntas_6, perguntas_7, perguntas_8, perguntas_9, form_id) 
					VALUES (:pergunta_id, :perguntas_0, :perguntas_1, :perguntas_2, :perguntas_3, :perguntas_4, :perguntas_5, :perguntas_6, :perguntas_7, :perguntas_8, :perguntas_9, :form_id)";
			
			$insertUm = $pdo->prepare($sql);			
			
			$insertUm->bindValue(":pergunta_id", 0);
			
			$insertUm->bindValue(":perguntas_0", $perguntas_0);
			
			$insertUm->bindValue(":perguntas_1", $perguntas_1);
			
			$insertUm->bindValue(":perguntas_2", $perguntas_2);
			
			$insertUm->bindValue(":perguntas_3", $perguntas_3);
			
			$insertUm->bindValue(":perguntas_4", $perguntas_4);
			
			$insertUm->bindValue(":perguntas_5", $perguntas_5);
			
			$insertUm->bindValue(":perguntas_6", $perguntas_6);
			
			$insertUm->bindValue(":perguntas_7", $perguntas_7);
			
			$insertUm->bindValue(":perguntas_8", $perguntas_8);
			
			$insertUm->bindValue(":perguntas_9", $perguntas_9);
			
			$insertUm->bindValue(":form_id", $lastId);
			
			$insertUm->execute();
			
			$sql = "INSERT INTO link(link_id, link_conteudo, form_id) VALUES (:link_id, :link_conteudo, :form_id)";
			
			$insertDois = $pdo->prepare($sql);			
			
			$insertDois->bindValue(":link_id", 0);
			
			$insertDois->bindValue(":link_conteudo", $formUrl);
			
			$insertDois->bindValue(":form_id", $lastId);
			
			$insertDois->execute();
			
		} 
		
		catch(PDOException $e)
		{
			$pdo->rollBack();
			echo "Erro: " . $e->getMessage();
		}
?>