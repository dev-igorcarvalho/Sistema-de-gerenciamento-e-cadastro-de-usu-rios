<?php
require_once "conecta.php";
require_once "autoload.php";


$id = ($_REQUEST['id']);

$usuario= new Usuario();

$usuario->setId($_REQUEST['id']);
$usuario->setNome($_REQUEST['nome']);
$usuario->setSenha($_REQUEST['senha']);
$usuario->setEmail($_REQUEST['email']);

$usuarioDao = new UsuarioDao($conexao);

$usuarioAntigo = $usuarioDao->buscaUsuarioAntigo($id);

$usuarioService = new UsuarioService();


if (($usuario->getNome() == null) || ($usuario->getEmail() == null) || ($usuario->getSenha() == null)) {

    header("location:recadastro.php?atualizaUsuario={$id}&campoEmBranco=1");

} else {

    if ($usuarioDao->existeUsuario($usuario) and $usuarioDao->existeEmail($usuario) and $usuarioAntigo[0] != $usuario->getNome() and $usuarioAntigo[1] != $usuario->getEmail()) {
        
        header("location:recadastro.php?atualizaUsuario={$id}&cadastrado=ambos");
         
    } elseif ($usuarioDao->existeUsuario($usuario) and $usuarioAntigo[0] != $usuario->getNome()) {

            header("location:recadastro.php?atualizaUsuario={$id}&cadastrado=usuarioExistente");

    } elseif ($usuarioDao->existeEmail($usuario) and $usuarioAntigo[1] != $usuario->getEmail()) {

            header("location:recadastro.php?atualizaUsuario={$id}&cadastrado=emailExistente");
        
    } else {
        
        $usuarioDao->atualiza($usuario);
        $usuarioService->deslogaUsuario();
        header('location:index.php?atualizado=1');
    } 
}

die();
