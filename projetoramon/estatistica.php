<?php include_once("conf/restricao.php");
      include_once("db/conexao.php"); 
?>

<!DOCTYPE html>

<html  lang="pt-br">

<head>
	<title>Consulta</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/estatistica.css">
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
</script>

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Pergunta', 'Quantidade'],
          ['pergunta 1',     11],
          ['pergunta 2',      2],
          ['pergunta 3',  4],
          ['pergunta 4', 6],
          ['pergunta 5', 1],
          ['pergunta 6', 10],
          ['pergunta 7', 9],
          ['pergunta 8', 3],
          ['pergunta 9', 2],
          ['pergunta 10',    7]
        ]);

        var options = {
          title: 'Meus Formulários',
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
				$sql = "SELECT * FROM forms";												
				$listar = $pdo->prepare($sql);								
				$listar->execute();
				//$res = $listar->fetch(PDO::FETCH_ASSOC);
				//$linha = $listar->rowCount();						
			} catch(PDOException $e){
					echo "Erro: " . $e->getMessage() . "<br>";
			}
           	
		?>

		<h1 style="text-align: center;">Estatísticas</h1><br><br>
		<h3>Escolha o Formulário</h3>
        <select>
            <option>......................................</option>
            <?php while($res = $listar->fetch(PDO::FETCH_ASSOC)){?>
            <option value=""><?=$res['form_titulo']?></option>
            <?php }?>
        </select>		
		
		<div id="piechart_3d" style="width: 900px; height: 500px;"></div>
        
	</div>

</body>


</html>