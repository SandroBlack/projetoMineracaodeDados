<?php
include_once("restricao.php"); 
// RESTRIÇÃO DE ACESSO AS PÁGINAS SEM ESTAR LOGADO.
session_start();

if(isset($_SESSION["logado"])){

} else{	
	header("location:index.php");
}

?>