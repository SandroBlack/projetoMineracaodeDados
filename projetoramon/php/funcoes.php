<?php

	include_once("../db/conexao.php");	
	
	$funcao = $_POST["funcao"];
	
	if($funcao == "login")
	{	
		login();
	}
	
	else if($funcao == "cadastro")
	{	
		cadastro();
	}
	
	function login(){
		
		$email = $_POST["email"];	
		
		$senha = $_POST["senha"];		

		try
		{
			$pdo = conectar();					
			
			$sql = "SELECT * FROM users WHERE user_email=?";
			
			$listar = $pdo->prepare($sql);					
			
			$listar->execute(array($email));
			
			$res = $listar->fetch(PDO::FETCH_ASSOC);
			
			$linha = $listar->rowCount();

			if($linha == 0)
			{
				$sucess = "0";
				
				echo $sucess;
				
				return 0;
			}
			
			elseif($res["user_ativado"] != 1)
			{
				$sucess = "1";
				echo $sucess;
				return 0;
			}

			else
			{
				
				
				if($senha == $res["user_password"])
				{
					session_start();
					
					$_SESSION["userId"] = $res["user_id"];
				
					$_SESSION["nomeUser"] = $res["user_name"];
				
					$_SESSION["logado"] = true;		
					
					$sucess = "11";	
				}
				
				else if ($senha == $res["user_password_temp"])
				{
					session_start();
					
					$_SESSION["userId"] = $res["user_id"];
				
					$_SESSION["nomeUser"] = $res["user_name"];
				
					$_SESSION["logado"] = true;	
					
					$sucess = "111";
				}
				
				else	
				{
					$sucess = "0";
				
					echo $sucess;
				
					return 0;
				}	
			}						
		
			echo $sucess;
		} 
		
		catch(PDOException $e)
		{
			$sucess = "0";
		
			echo $sucess;
		
			return 0;
		}						

	}

	function cadastro(){
		
		$nome = $_POST["nome"];
		
		$email = $_POST["email"];
		
		$senha = $_POST["senha"];
		
		$captcha = $_POST["captcha"];
				
		if($nome == "" || $email == "" || $senha == "" || $captcha == ""){
			echo "<script>alert('Favor Preencher Todos os Campos!')<scrippt>";
			return false;	
		} else if($captcha != $_SESSION["captcha"]){ 
			echo "<script>alert('O Código Informado não Confere!')<scrippt>";
			return false;
		} else{

			try
			{
				$pdo = conectar();								
				$sql = "SELECT user_email FROM users";
				$listar = $pdo->prepare($sql);								
				$listar->execute();
				$res = $listar->fetchAll(PDO::FETCH_ASSOC);
			}
			
			catch(PDOException $e)
			{
				$sucess = "0";
			
				echo $sucess;
			
				return 0;
			}
		}
		foreach ($res as &$value) 
		{
			if($email == $value["user_email"])
			{
				$sucess = "01";
				
				echo $sucess;
				
				return 0;
			}
		}
		
		try
		{
			$pdo = conectar();	
			
			$sql = "INSERT INTO users(user_name, user_email, user_password, user_password_temp, user_ativado) VALUES(:nome, :email, :senha, :temp, :ativado)";
				
			$inserir = $pdo->prepare($sql);
				
			$inserir->bindValue(":nome", $nome);
				
			$inserir->bindValue(":email", $email);
				
			$inserir->bindValue(":senha", $senha);
				
			$inserir->bindValue(":temp", "");
				
			$inserir->bindValue(":ativado", 0);
				
			$inserir->execute();
			
			$sucess = "1";
				
			echo $sucess;
		} 
				
		catch(PDOException $e)
		{
			$sucess = "0";
	
			echo $sucess;
		
			return 0;
		}						
	}


?>