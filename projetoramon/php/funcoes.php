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
	
	else if($funcao == "listaFormulario")
	{	
		listaFormulario();
	}
	
	else if($funcao == "redefinir")
	{	
		redefinir();
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
					
					$_SESSION["emailUser"] = $res["user_email"];
				
					$_SESSION["logado"] = true;		
					
					$sucess = "11";	
				}
				
				else if ($senha == $res["user_password_temp"])
				{
					session_start();
					
					$_SESSION["userId"] = $res["user_id"];
				
					$_SESSION["nomeUser"] = $res["user_name"];
					
					$_SESSION["emailUser"] = $res["user_email"];
				
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
		
		require("../gerar-senha.php");
		require("../envio-email.php");
		
		session_start();
		
		$nome = $_POST["nome"];
		
		$email = $_POST["email"];
		
		$senha = $_POST["senha"];
		
		$captcha = $_POST["captcha"];
		
		$link = geraSenha(20, true, true, true);
				
		if($nome == "" || $email == "" || $senha == "" || $captcha == "")
		{	
			$sucess = "invalido";
			
			echo $sucess;
			
			return 0;	
			
		} 
		/*
		else if($captcha != $_SESSION["captcha"])
		{ 
			$sucess = "codCaptcha";
			
			echo $sucess;
			
			return 0;
		}
		*/
		else
		{

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
			
			$sql = "INSERT INTO users(user_name, user_email, user_password, user_password_temp, user_ativado, user_link) VALUES(:nome, :email, :senha, :temp, :ativado, :link)";
				
			$inserir = $pdo->prepare($sql);
				
			$inserir->bindValue(":nome", $nome);
				
			$inserir->bindValue(":email", $email);
				
			$inserir->bindValue(":senha", $senha);
				
			$inserir->bindValue(":temp", "");
				
			$inserir->bindValue(":ativado", 0);
			
			$inserir->bindValue(":link", $link);
				
			$inserir->execute();
			
			
			$assunto = "Ativação da Conta - Projeto Facima";
			
			$corpo = "http://condominioslaranjeiras.com.br/projeto/ativa.php?ativa=".$link;
						
			$enviarEmail = enviarEmail($email, $corpo, $assunto);
			
			$sucess = "1";

			echo $sucess;
		} 
				
		catch(PDOException $e)
		{
			$sucess = "0";
	
			echo $sucess;
		
			return 0;
		}
		
		session_destroy();		
	
	}

	function listaFormulario() {
	
		$nomeFormulario = $_POST["nomeFormulario"];
		
		try
		{
			$pdo = conectar();	
			
			$sql = "SELECT
					f.form_titulo,
					p.perguntas_0,p.perguntas_1,p.perguntas_2,p.perguntas_3,p.perguntas_4,p.perguntas_5,p.perguntas_6,p.perguntas_7,p.perguntas_8,p.perguntas_9,
					r.respostas_data,r.respostas_0,r.respostas_1,r.respostas_2,r.respostas_3,r.respostas_4,
					r.respostas_5,r.respostas_6,r.respostas_7,r.respostas_8,r.respostas_9
					FROM
					forms f                     
                    INNER JOIN perguntas p ON f.form_id = p.form_id                    
                    INNER JOIN respostas r ON p.pergunta_id = r.pergunta_id                    
					WHERE f.form_titulo = ?";
			
			$listar = $pdo->prepare($sql);
			
			$listar->execute(array($nomeFormulario));
			
			$vetor = $listar->fetchAll(PDO::FETCH_ASSOC);
			
			echo json_encode($vetor);
		}
		
		catch(PDOException $e)
		{
			$sucess = "0";
	
			echo $sucess;
		
			return 0;
		}
	
	}

	function redefinir(){
		
		session_start();
		
		$senha = $_POST["senha"];
		
		$email = $_SESSION['emailUser'];
		
		try
		{		
			$pdo = conectar();
			
			$sql = "UPDATE users
					SET user_password = ?, user_password_temp = NULL
					WHERE user_email = ?";
					
			$atualizar = $pdo->prepare($sql);
			
			$atualizar->execute(array($senha,$email));
			
			echo "sucesso";
		}
		catch(PDOException $e)
		{
			$sucess = "0";
	
			echo $sucess;
		
			return 0;
		}
		
	}	
?>