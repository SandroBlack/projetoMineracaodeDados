<?php include_once("conf/restricao.php");

$email = $_POST["email"];
$link = $_POST["link"];
$assunto = $_POST["assunto"];
// IMPLEMENTAR A FUNÇÃO DE ENVIAR O E-MAIL COM O LINK PARA RESPONDER A PESQUISA
echo "Email do Convidado: " . $email . "<br>";
echo "Assunto do Formulário: " . $assunto . "<br>";
echo "Link do Formulário: " . $link;	


?>