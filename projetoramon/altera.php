<title>altera.php</title>
<?php
//Inicia a sessão
session_start();
//Verifica se há dados ativos na sessão
if(empty($_SESSION["user_id"]) || empty($_SESSION["user_nome"]) || empty($_SESSION["user_email"]))
{
//Caso não exista dados registrados, exige login
header("Location:../login.php");
}


include "../config.php";

// recebe dados do formulario
$senha = $_POST['senha'];
$rep_senha = $_POST['rep_senha'];

// verifica se o usuario digitou a senha
if($senha == "") {
    echo "<font color=red><b>
          Digite sua senha! $login
          </font></b>";
    exit;
} else {
    // se ele digitou vamos comparar
    if($senha != $rep_senha) {
        echo "<font color=red><b>
              Senha invalida!
              </font></b>";
        exit;
    }
}

// altera a senha
$consulta = mysql_query("update user set user_senha = '$senha' where user_emails = '$email'");

// verifica se foi alterada a senha
if($consulta) {
    $msg = urlencode("Senha alterada com sucesso!");
    header("Location: ../maraba/index.php?msg=$msg");
    exit;
} else {
    $erro = urlencode("Não foi possivel alterar a senha!");
    header ("Location: ../maraba/index.php?erro=$erro");
    exit;
}

?>