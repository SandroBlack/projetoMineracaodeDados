<?php include_once("conf/restricao.php");
session_start();
require("gerar-senha.php");
require("envio-email.php");


$email = $_POST["email"];
$corpo = $_POST["link"];
$assunto = $_POST["assunto"];
$nome = $_SESSION["nomeUser"];

$nCorpo = $nome." lhe convida para responder seu formulario em: http://condominioslaranjeiras.com.br/projeto/form_resposta.php?link_conteudo=".$corpo;

$enviarEmail = enviarEmail($email, $nCorpo, $assunto);

header('Location: http://condominioslaranjeiras.com.br/projeto/consulta.php');

?>