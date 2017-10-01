<?php
	require 'PHPMailer/PHPMailerAutoload.php';
	
	$Mailer = new PHPMailer();
	
	//Define que sera usado SMTP
	$Mailer->IsSMTP():
	
	//Enviar e-mail em HTML
	$Mailer->isHTML(true);
	
	//Aceitar caracteres especiais
	$Mailer->Charset = 'UTF-8';
	
	//configurações
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'ssl';
	
	//Nome do servidor
	$Mailer->'colocar nome';
	
	//Porta de saida de e-mail
	$Mailer->Port = 8080;
	
	//Dados do e-mail de saida
	$Mailer->Username = 'joseanojunior13@gmail.com';
	$Mailer->Password = 'mascarado';
	
	//E-mail remetente
	$Mailer->From = 'joseanojunior13@gmail';
	
	//Nome do remetente
	$Mailer->FromName = 'Mascarado';
	
	//Assunto da mensagem
	$Mailer->Subject = 'Titulo - Recuperar Senha';
	
	//Corpo da mensagem
	$Mailer->Body = 'Conteudo do E-mail';
	
	//Corpo da mensagem em texto
	$Mailer->AltBody = 'conteudo do E-mail em texto';
	
	//Destinatario
	$Mailer->AddAddress('joseanojunior13@gmail');
	
	if($Mailer->Send()){
		echo "E-mail enviado com sucesso";
	}else{
		echo"Erro no envio do e-mail: " . $Mailer->ErroInfo;
	}
	
?>