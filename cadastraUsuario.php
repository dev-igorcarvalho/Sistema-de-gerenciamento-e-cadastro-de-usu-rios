<?php
require_once "conecta.php";
require_once "autoload.php";

$usuario = new Usuario();

$usuario->setNome($_REQUEST['usuario']);
$usuario->setSenha($_REQUEST['senha']);
$usuario->setEmail($_REQUEST['email']);

/*
$usuario = $_REQUEST['usuario'];
$senha = $_REQUEST['senha'];
$email = $_REQUEST['email'];
*/

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
        $usuarioDao->cadastra($usuario);
        header('location:index.php?cadastrado=1');
    } 
}

die();
