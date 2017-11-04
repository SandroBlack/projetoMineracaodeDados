<?php include_once("conf/restricao.php");

$email = $_POST["emailForm"];
$link = $_POST["linkForm"];

// IMPLEMENTAR A FUNÇÃO DE ENVIAR O E-MAIL COM O LINK PARA RESPONDER A PESQUISA
echo "Email do Convidado: " . $email . "<br>";
echo "Link do Formulário: " . $link;	


?>