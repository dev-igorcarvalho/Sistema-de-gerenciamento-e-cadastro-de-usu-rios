<?php 

require_once "autoload.php";
$usuarioService = new UsuarioService();
$usuarioService->verificaUsuario();

?>







<?php require_once "html-estrutura/cabecalho.php"; ?>


    <?php 
        if(array_key_exists('login', $_REQUEST)){
            if($_REQUEST['login']==true){
    ?>
        <p class="text-center alert alert-success msg">Olá, <?=$usuarioService->usuarioLogado ();?> seja bem vindo</p>
    <?php
            }
        }
    ?>


<?php require_once "html-estrutura/rodape.php"; ?>