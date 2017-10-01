<?php 
function conectar(){
	$host = "mysql:host=localhost; dbname=mineracao";
	$usuario = "sandro";
	$senha = "kof95";

	try{
		$pdo = new PDO($host, $usuario, $senha);		
	} catch(PDOException $e){
		echo "Erro: " . $e->getMessage() . "<br>";
	}
	return $pdo;
}	

?>