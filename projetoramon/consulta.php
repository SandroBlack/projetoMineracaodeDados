<?php include_once("conf/restricao.php");
      include_once("db/conexao.php"); 
?>

<!DOCTYPE html>

<html  lang="pt-br">

<head>
	<title>Consulta</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/consulta.css">
	<link rel="icon" href="img/icon.png">
</head>

<script>
	
	/*$(document).ready(function(){
		//var id = document.querySelector('.btnX').id;
		//var idx = "" + id;	
		//alert(idx);

		var btnAbrir = $("#btnConvidar");
		var linkFechar = $("#close");
		var containerModal = $(".modal");
		
		btnAbrir.click(function(){
			containerModal.fadeToggle(0);
			return false;
		});

		linkFechar.click(function(){
			containerModal.fadeToggle(0);
			return false;
		});

		$("#btnModal").click(function(){
			var link = document.getElementById("linkForm").value;
			var email = document.getElementById("txtEmail").value;
			var assunto = document.getElementById("txtAssunto").value;
			document.getElementById("link").value = link;
			document.getElementById("email").value = email;
			document.getElementById("assunto").value = assunto;			
			$('#formConvite').submit();
			return false;			
			alert("Convite Enviado com Sucesso");							
		});
	});*/

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
   

</script>
<body>
	<!-- ======== Cabeçalho ========== -->
	<header id="cabecalho">

		<a href="menu-usuario.php">&larr; Voltar</a>

	</header><!-- ======== Fim do cabeçalho ==========-->


	<div class="container">	
		<?php

			try{
				$pdo = conectar();								
				$sql = "SELECT forms.form_id, forms.form_titulo, forms.form_Qquestoes, forms.form_time, link.link_conteudo 
						FROM forms 
						INNER JOIN link ON forms.form_id = link.form_id
						WHERE user_id=?";
				$listar = $pdo->prepare($sql);								
				$listar->execute(array($_SESSION["userId"]));
				//$res = $listar->fetch(PDO::FETCH_ASSOC);
				//$linha = $listar->rowCount();
						
			} catch(PDOException $e){
					echo "Erro: " . $e->getMessage() . "<br>";
			}	
		?>

		<h1 style="text-align: center;">Seus Formulários</h1><br><br>		
		
		<table style="width: 810px;margin: 10px auto 0px auto;" cellspacing="10" >

			<tr>			
				<th style="width: 270px;text-align: left;">Título</th>
				<th style="width: 270px;text-align: left;">Criado em:</th>
				<th style="width: 270px;text-align: left;">Convite</th>
			</tr>
			
			<?php $i=1; while($res = $listar->fetch(PDO::FETCH_ASSOC)){ ?>
				
				<form name="formConvite" id="formConvite<?=$res["form_id"]?>" method="POST" action="htmlEmail.php">

					<tr>
						<td style="display:none"><input type="hidden" name="linkForm" id="linkForm" value="<?=$res["link_conteudo"]?>"></td>
						<!--<td style="display:none"><input type="hidden" name="emailForm" id="emailForm" value=""></td>-->
						<!--<td style="display:none"><input type="hidden" name="assuntoForm" id="assuntoForm" value=""></td>-->							
						<td align="left"><a href="http://localhost/projetoMineracaodeDados/projetoramon/form_resposta.php?link_conteudo=<?=$res['link_conteudo']?>" target="_blank"><?=$res["form_titulo"]?></a></td>
						<td><?=$res["form_time"]?></td>	
						<td><input type="submit" id="btnConvidar<?=$res["form_id"]?>" value="Convidar" onclick=""></td>
						<!--<td><button type="button" class="btnX" id="btnConvidar">Convite</button></td>-->					
					</tr>
												
				</form>	
				
			<?php }?>				
			
		</table>

		<!--<form name="formConvite" id="formConvite" method="POST" action="htmlEmail.php">
			<input type="hidden" name="link" id="link" value="">
			<input type="hidden" name="email" id="email" value="">
			<input type="hidden" name="assunto" id="assunto" value="">
		</form>

	<!-- JANELA MODAL -->	
	<!--<div class="modal" id="sendModal">
		<h2>Enviar Convite</h2>
		<a href="" id="close" title="Fechar">X</a>
		<label for="email">Para:</label>
		<input type="text" id="txtEmail" value=""/><br>
		<label for="assunto">Assunto:</label>
		<input type="text" id="txtAssunto" value=""/><br>
		<button type="button" id="btnModal">Enviar</button>
	</div>	-->
	</div>

</body>


</html>