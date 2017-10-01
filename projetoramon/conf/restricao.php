<?php
include_once("restricao.php"); 
// RESTRIÇÃO DE ACESSO AS PÁGINAS SEM TER FEITO LOGIN.
session_start();

if(isset($_SESSION["logado"])){

} else{
	echo "<script>alert('Acesso Negado, Favor Efetuar o Login.');</script>";
	header("location:index.php");
}

?>