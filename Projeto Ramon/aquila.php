<?php include_once("conf/restricao.php");?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- ========== Título ============ -->
    <title>Formulários</title>

    <!-- ========== Metas ============ -->
    <meta charset="utf-8">

    <!-- ========== Links ============ -->
    <link rel="stylesheet" href="css/formularios.css">
    <link rel="icon" href="img/icon.png">

    <!-- ========== Scripts ============ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/sistema.js"></script>    
</head>


<body>
    <!-- ======== Cabeçalho ========== -->
    <header id="cabecalho">
        
        
        <a href="menu-usuario.php"><img src="img/6980_256x256.png" style="width: 50px; height: 50px; margin:10px 0px 0px 30px; float: left;"></a>
        <h2 style="float: left;"> Facima Formulários</h2>
        <button style="float: right; margin:21px 30px 0px 0px; width: 70px;height: 30px; font-size: 16px; border-radius:4px; background:#0066ff;color:#ffffff; border: none;">Logout</button>
        <button class="botao" id="enviar" name="enviar" style="float: right;">Enviar</button>

    </header><!-- ======== Fim do cabeçalho ==========-->

    <!-- ====== container ====== -->
    <div class="container">
        <div class="area" align="center"><br>
            <h1>Seu formulário</h1><br>
        </div>

        <!-- ============== Campo de Título ===============-->
        <form class="titulo" >
            <input type="text" name="titulo" id="titulo" placeholder="Título do formulário" maxlength="30"><br><br>
            <input type="text" name="descricao" id="descricao" placeholder="Descrição do formulário" maxlength="30" size="90%"><br><br>
        </form><br><br>

        <!-- ============== Campo de resposta ===============-->
        <div id="base">
            <form id="perguntas"> 
            </form>       	
        </div><!-- Fim da Base -->

        <div class="barra-inferior" id="menu">
            <div class="area-botoes">
                <img src="img/Defult Text.png" class="dublicar" id="duplicar" title="adicionar uma pergunta">      
                <img src="img/delete_remove_bin_icon-icons.com_72400.png" class="excluir" id="exclusao" title="excluir a ultima pergunta adicionada">
            </div>
        </div><!-- Fim da barra inferior -->
    </div><!-- Fim do container -->

    <div id="campoEscondido">
        <input name="contador" id="contador" type="hidden" value="">
        <input name="posicaoArray" id="posicaoArray" type="hidden" value="">
    </div>

    <div id="campoEscondidoDois">
        <input name="posicaoArray" id="posicaoArray" type="hidden" value="">
    </div>
     <div>
       <form method="post" name="testando" id="testando" action="recebe.php" />
           <input name="Valores" id="Valores" type="hidden" value="">
       </form>
    </div>

</body>

</html>