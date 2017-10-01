<?php
	$recebe = $_POST["FormularioCompleto"];
	$recebeX = str_replace('|', ' ', $recebe);

	$arq = fopen("teste.txt", "a+");
	fwrite($arq, $recebeX);
	fclose($arq);
	//header("location:menu-usuario.php");

// MONTAR A PÁGINA COM O CONTEÚDO DO ARQUIVO TXT
	$arq = fopen("teste.txt", "r");
	$cont = fread($arq, 10000);
	echo $cont;	

?>