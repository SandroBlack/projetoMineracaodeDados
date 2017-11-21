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

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="js/estatistica.js" /></script>
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
		
		session_start();
			try{
				$pdo = conectar();								
				$sql = "SELECT * 
						FROM
						users INNER JOIN forms ON users.user_id = forms.user_id
						WHERE users.user_id =?";												
				$listar = $pdo->prepare($sql);	

				$listar->execute(array($_SESSION["userId"]));
				
				$listar->execute();
				//$res = $listar->fetch(PDO::FETCH_ASSOC);
				//$linha = $listar->rowCount();						
			} catch(PDOException $e){
					echo "Erro: " . $e->getMessage() . "<br>";
			}
           	
		?>

		<h1 style="text-align: center;">Estatísticas</h1><br><br>
		<h3>Escolha o Formulário</h3>
        <select id="formularios" name="formularios">
            <option>......................................</option>
            <?php while($res = $listar->fetch(PDO::FETCH_ASSOC)){?>
            <option value="<?=$res['form_titulo']?>"><?=$res['form_titulo']?></option>
            <?php }?>
        </select>		
		
		<!-- <div id="piechart_3d" style="width: 900px; height: 500px;"></div> -->
        
		<div id="estatisticas" name="estatisticas">
		</div>
		<div align="center">
		<label>Respostas :</label><br>
		<input type="number" name="respostaAtual" id="respostaAtual" value="0"/><label id="respostasTotais" name="respostasTotais" ></label>		
		</div>
		<div id="listarRespostas" name="listarRespostas" align="center">
		
		</div>
		

</body>


</html>