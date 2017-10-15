<?php 
require_once "conecta.php";
require_once "autoload.php";
$usuarioService = new UsuarioService();
$usuarioService->verificaUsuario();

$usuario = new Usuario();
$usuarioDao = new UsuarioDao($conexao);
?>

<?php
    if($usuarioService->usuarioEstaLogado()){
        $usuario->setNome($usuarioService->usuarioLogado());
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
            <p class="text-center">Olá, <?=$usuario->getNome();?> seja bem vindo</p>
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
    <div class="col-xs-3 col-md-3 text-center alert alert-danger">
    <a class="alert-danger" href="remover.php?removeUsuario=<?=$usuario->getId()?>">Apagar cadastro</a>
    </div>
</div>

<div class="row">
    <div class="col-xs-3 col-md-3 col-md-offset-3 col-xs-offset-3 text-center alert alert-info">
        <a class="alert-info" href="recadastro.php?atualizaUsuario=<?=$usuario->getId()?>">Atualizar cadastro</a>
    </div>
    <div class="col-xs-3 col-md-3 text-center alert alert-warning">
        <a class="alert-warning" href="logout.php">Deslogar</a>
    </div>
</div>



<?php require_once "html-estrutura/rodape.php"; ?>