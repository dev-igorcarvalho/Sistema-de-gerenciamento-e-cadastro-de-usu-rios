<?php 
require_once "conecta.php";
require_once "autoload.php";
$usuarioService = new UsuarioService();
$usuarioService->verificaUsuario();

$usuario = new Usuario();
$usuarioDao = new UsuarioDao($conexao);
?>

<?php
    if($usuarioService->usuarioLogado()){
        $usuario->setNome($_SESSION['usuario_logado']);
        $usuarioDao->buscaID($usuario);
    }
?>

<?php require_once "html-estrutura/cabecalho.php"; ?>

<?php 
    if(array_key_exists('login', $_REQUEST)){
        if($_REQUEST['login']==true){
?>
    <div class="row">
        <div class="col-xs-6 col-md-6 col-md-offset-3 col-xs-offset-3 text-center alert alert-info">
            <p class="text-center">Olá, <?=$usuarioService->usuarioLogado ();?> seja bem vindo</p>
        </div>
    </div>

<?php
        }
    }
?>

<div class="row">
    <div class="col-xs-3 col-md-3 col-md-offset-3 col-xs-offset-3 text-center alert alert-success">
        <p>Place Holder</p>
    </div>
    <div class="col-xs-3 col-md-3 text-center alert alert-warning">
        <p>Place Holder</p>
    </div>
</div>

<div class="row">
    <div class="col-xs-3 col-md-3 col-md-offset-3 col-xs-offset-3 text-center alert alert-info">
        <a class="alert-info" href="cadastro.php?atualizaUsuario=<?=$usuario->getId()?>">Atualizar cadastro</a>
    </div>
    <div class="col-xs-3 col-md-3 text-center alert alert-danger">
        <a class="alert-danger" href="logout.php">Deslogar</a>
    </div>
</div>



<?php require_once "html-estrutura/rodape.php"; ?>