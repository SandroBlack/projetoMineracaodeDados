<?php
// MONTAR A PÁGINA COM O CONTEÚDO DO ARQUIVO TXT
	
	$FormularioCompleto = $_POST["FormularioCompleto"];
	$FormularioCompletoTratado = str_replace("|", " ", $FormularioCompleto);
	
	$arq = fopen("teste.txt", "r+");
	fwrite($arq, $FormularioCompletoTratado);
	fclose($arq);
	
	echo $FormularioCompletoTratado ;
?>