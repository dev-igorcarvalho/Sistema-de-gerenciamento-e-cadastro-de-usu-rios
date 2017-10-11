<?php
require_once "conecta.php";
require_once "autoload.php";

$usuario = new Usuario();
$usuarioService = new UsuarioService();

$usuario->setId($_REQUEST['id']);
$usuario->setNome($_REQUEST['nome']);
$usuario->setSenha($_REQUEST['senha']);
$usuario->setEmail($_REQUEST['email']);

$usuarioDao = new UsuarioDao($conexao);

if (($usuario->getNome() == null) || ($usuario->getEmail() == null) || ($usuario->getSenha() == null)) {
    header('location:cadastro.php?campoEmBranco=1');
} else {
    if ($usuarioDao->existeUsuario($usuario) and $usuarioDao->existeEmail($usuario)){
        header('location:cadastro.php?cadastrado=ambos');
    } elseif ($usuarioDao->existeUsuario($usuario)) {
        header('location:cadastro.php?cadastrado=usuarioExistente');
    } elseif ($usuarioDao->existeEmail($usuario)) {
        header('location:cadastro.php?cadastrado=emailExistente');
    } else {
        $usuarioDao->atualiza($usuario);
        $usuarioService->deslogaUsuario();
        header('location:index.php?atualizado=1');
    } 
}

die();
