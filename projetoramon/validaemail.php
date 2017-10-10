<?php

include_once('config.php');

$id = $_GET['id'];
$emailMd5 = $_GET['email'];
$uidMd5 = $_GET['uid'];
$dataMd5 = $_GET['key'];

$sql = "select * from cadastro where id_cadastro = '$id'";
$sql = mysql_query( $sql );
$rs = mysql_fetch_array( $sql );

$valido = true;

if( $emailMd5 !== md5( $rs['email'] ) )
    $valido = false;

if( $uidMd5 !== md5( $rs['uid'] ) )
    $valido = false;

if( $dataMd5 !== md5( $rs['data_ts'] ) )
    $valido = false;

if( $valido === true ) {
    $sql = "update cadastro set ativo='1' where id_cadastro='$id'";
    mysql_query( $sql );
    echo "Cadastro ativado com sucesso!";
} else {
    echo "Informacoes invalidas";
}

?>