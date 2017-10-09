<?php 
function conectar(){
	$host = "mysql:host=localhost; dbname=mineracao";
	$usuario = "root";
	$senha = "";

	try{
		$pdo = new PDO($host, $usuario, $senha,array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::ATTR_PERSISTENT => false,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ));		
	} catch(PDOException $e){
		echo "Erro: " . $e->getMessage() . "<br>";
	}
	return $pdo;
}	

?>