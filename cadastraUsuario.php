<?php
require_once "conecta.php";
require_once "autoload.php";

$usuario = new Usuario();

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
        header("location:cadastro.php?cadastrado=usuarioExistente&email={$_REQUEST['email']}");
    } elseif ($usuarioDao->existeEmail($usuario)) {
        header("location:cadastro.php?cadastrado=emailExistente&nome={$_REQUEST['nome']}");
    } else {
        $usuarioDao->cadastra($usuario);
        header('location:index.php?cadastrado=1');
    } 
}

die();
