<?php 
	$recebe = $_POST["Valores"];
	$recebeX = str_replace('|', ' ', $recebe);

	$arq = fopen("teste.txt", "a+");
	fwrite($arq, $recebeX);
	fclose($arq);
	header("location:menu-usuario.php");
?>