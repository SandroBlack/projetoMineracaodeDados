<?php include_once("conf/restricao.php");?>

<!DOCTYPE html>
<html  lang="pt-br">

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
        <h2>Formulários Facima</h2>
        <button class="botao">Enviar</button>
    </header><!-- ======== Fim do cabeçalho ==========-->

    <!-- ====== container ====== -->
    <div class="container">

        <div class="area" align="center">
            <br>
            <h1>Seu formulário</h1>
            <br>
        </div>
        <!-- ============== Campo de Título ===============-->
        <form class="titulo">            
            <input type="text" name="titulo" id="titulo" placeholder="Título do formulário" maxlength="30"><br><br>
            <input type="text" name="descricao" id="descricao" placeholder="Descrição do formulário" maxlength="30" size="90%"><br><br>
        </form><br><br>

        <!-- ============== Campo de resposta ===============-->
        <div id="base">

        </div><!-- Fim da Base -->
        <div class="barra-inferior" id="menu">            
            <div class="area-botoes">                                
                <img src="img/Defult Text.png" class="dublicar" id="duplicar" title="adicionar uma pergunta">       
                <img src="img/delete_remove_bin_icon-icons.com_72400.png" class="excluir" id="exclusao" title="excluir a ultima pergunta adicionada">
            </div>
            
        </div><!-- Fim da barra inferior -->        
    </div><!-- Fim do container -->

    <div id="divParaCopia">
        <form class="questoes">
            <!-- ====== Campo de pergunta ====== -->
            <input type="text" name="pergunta" id="pergunta" placeholder="Pergunta">
            <select name="selecionar" id="selecionar"><!-- Campo de opções -->
                <option value="100">Tipo de resposta</option>
                <option value="200">Campo de texto</option>
                <option value="300">Múltipla Escolha</option>
                <option value="400">Caixas de Seleção</option>
            </select>
        </form>

        <!-- =============== Campo dos Inputs =================-->
        <form class="opcoes" id="formulario-inputs">
            <div class="area-inputs" id="area-inputs">

                <!-- ============= Campo de Texto =============-->
                <input type="text" name="campo-de-texto" placeholder=" Resposta" id="resposta-usuario" class="hide"><br>

                <!-- ============= Campo do Radio =============-->
                <div id="baseRadio" class="hide">
                    <div id="divParaCopiaRadio">
                        <input type="radio" name="campo de multipla escolha">
                        <input type="text" name="opcao-radio">
                    </div><br>

                    <div class="area-adicionar-remover">
                        <button class="adicionar-azul" title="Adiciona mais uma opção">Adicionar Opção</button>
                        <button class="remover-vermelho" title="Remove a última opção">Remover Opção</button>
                    </div>
                </div>

                <!-- ============= Campo do Checkbox =============-->
                <div id="baseCheckbox" class="hide">
                    <div id="divParaCopiaCheckbox">
                        <input type="checkbox" name="escolha alternada">
                        <input type="text" name="opcao-checkbox">
                    </div>

                    <div class="area-adicionar-remover">
                        <button class="adicionar-azul" title="Adiciona mais uma opção">Adicionar Opção</button>
                        <button class="remover-vermelho" title="Remove a última opção">Remover Opção</button>
                    </div>
                </div>
            </div>
        </form><!-- Fim do campo dos inputs -->
        
    </div><!-- Fim da Copia -->

    <div id="campoEscondido">
        <input name="contador" id="contador" type="hidden" value="">
    </div>

</body>

</html>