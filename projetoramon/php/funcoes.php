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
			
			$corpo = "http://localhost/projetomineracaodedados/projetoramon/ativa.php?ativa=".$link;
						
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
					forms.form_titulo,
					a.perguntas_0,a.perguntas_1,a.perguntas_2,a.perguntas_3,a.perguntas_4,a.perguntas_5,a.perguntas_6,a.perguntas_7,a.perguntas_8,a.perguntas_9,
					respostas.respostas_data,respostas.respostas_0,respostas.respostas_1,respostas.respostas_2,respostas.respostas_3,respostas.respostas_4,
					respostas.respostas_5,respostas.respostas_6,respostas.respostas_7,respostas.respostas_8,respostas.respostas_9
					FROM 
					forms INNER JOIN perguntas a ON forms.form_id = a.form_id,
					perguntas b INNER JOIN respostas ON b.pergunta_id = respostas.pergunta_id
					WHERE forms.form_titulo = ?";
			
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