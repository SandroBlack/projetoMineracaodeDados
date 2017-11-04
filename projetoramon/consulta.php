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
	
	$(document).ready(function(){
		
		$(".btnConvidar").click(function(){
			/* JANELA MODAL */
			var id = this.id;		
			var btnAbrir = $("#"+id);		
			var linkFechar = $("#close");		
			var containerModal = $(".modal");
					
			containerModal.fadeToggle(0);
			
			linkFechar.click(function(){
				containerModal.fadeToggle(0);
				//return false;
			});

			$("#btnModal").click(function(){
				
				$("#email").val($("#txtEmail").val());
				$("#assunto").val($("#txtAssunto").val());
				$("#link").val($("#linkForm"+id).val());
				if($("#email").val() == "" || $("#assunto").val() == ""){
					alert("Favor Preencher Todos os Campos");
					return false;
				} else{					
					$('#formConvite').submit();				
					$("#txtEmail").val("");
					$("#txtAssunto").val("");
					return false;
				}
			});
		});
	});

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
			
			<?php while($res = $listar->fetch(PDO::FETCH_ASSOC)){ ?>				

					<tr>						
						<td style="display:none"><input type="hidden" name="emailForm" id="emailForm" value=""></td>
						<td style="display:none"><input type="hidden" name="assuntoForm" id="assuntoForm" value=""></td>
						<td style="display:none"><input type="hidden" name="linkForm" id="linkForm<?=$res["form_id"]?>" value="<?=$res["link_conteudo"]?>"></td>
						<td align="left"><a href="http://localhost/projetoMineracaodeDados/projetoramon/form_resposta.php?link_conteudo=<?=$res['link_conteudo']?>" target="_blank"><?=$res["form_titulo"]?></a></td>
						<td><?=$res["form_time"]?></td>							
						<td><button type="button" class="btnConvidar" id="<?=$res["form_id"]?>">Convite</button></td>					
					</tr>			
				
			<?php }?>				
			
		</table>

		<form id="formConvite" method="POST" action="htmlEmail.php">
				<input type="hidden" name="email" id="email" value="">
				<input type="hidden" name="assunto" id="assunto" value="">
				<input type="hidden" name="link" id="link" value="">				
		</form>		

		<!--JANELA MODAL -->	
		<div class="modal" id="sendModal">
			<h2>Enviar Convite</h2>
			<a href="" id="close" title="Fechar">X</a>
			<label for="email">Para:</label>
			<input type="text" id="txtEmail" value=""/><br>
			<label for="assunto">Assunto:</label>
			<input type="text" id="txtAssunto" value=""/><br>
			<button type="button" id="btnModal">Enviar</button>
		</div>
	
	</div>

</body>


</html>