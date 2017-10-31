<?php include_once("conf/restricao.php");?>

<script>
	var email = prompt("Digite o Email do Convidado");
</script>

<?php	
	$email = "<script>document.write(email)</script>";
	$link = $_POST["linkForm"];		

// IMPLEMENTAR A FUNÇÃO DE ENVIAR O E-MAIL COM O LINK PARA RESPONDER A PESQUISA

	/*function emailWelcome(){
		
		$corpo = '';		
	
	}*/

echo "Link do Form: " . $link;
echo "<br>";
echo "E-mail do Covidado: " . $email;
echo "<script>alert('Convite Enviado com Sucesso.')</script>";

?>