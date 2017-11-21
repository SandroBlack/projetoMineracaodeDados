<?php
	include_once("db/conexao.php");
	
	$ativa = $_GET["ativa"]; // ID DAS PERGUNTAS ARMAZENADAS NO BANCO, DEPOIS A VARIÁVEL RECEBERÁ ID VIA GET
	
	$pdo = conectar();
	
	$sql = "UPDATE users SET user_ativado = '1' WHERE users.user_link = ?";
			
	$listar = $pdo->prepare($sql);
	
	$listar->execute(array($ativa));
	
	header('Location: http://condominioslaranjeiras.com.br/projeto/cadastro.html');
	
?>