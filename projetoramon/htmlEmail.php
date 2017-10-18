<?php include_once("conf/restricao.php");?>

<script>
	var email = prompt("Digite o Email do Convidado");
</script>

<?php 

	/*function emailWelcome(){
		
		$corpo = '';		
	
	}*/
	
	
$link = $_POST["linkForm"];
$email = "<script>document.write(email)</script>";





echo "Link do Form: " . $link;
echo "<br>";
echo "E-mail do Covidado: " . $email;
echo "<script>alert('Convite Enviado com Sucesso.')</script>";
echo "<script>location.href='consulta.php'</script>";

?>