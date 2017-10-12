<?php
require_once "conecta.php";
require_once "autoload.php";

$id = ($_REQUEST['id']);

$usuario= new Usuario();

$usuario->setNome($_REQUEST['nome']);
$usuario->setSenha($_REQUEST['senha']);

$usuarioDao = new UsuarioDao($conexao);

$usuarioAntigo = $usuarioDao->buscaUsuarioAntigo($id);

$usuarioService = new UsuarioService();

if ($usuarioDao->verifica($usuario)){

    if ($usuarioAntigo[0] == $usuario->getNome()) {
        $usuarioDao->removeUsuario($id);
        $usuarioService->deslogaUsuario();
        header('location:index.php');
    }
       
} else {
    header("location:remover.php?usuarioRemovido=0");
}
    
die();
