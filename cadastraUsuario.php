<?php
require_once "conecta.php";
require_once "autoload.php";

$usuario = $_REQUEST['usuario'];
$senha = $_REQUEST['senha'];
$email = $_REQUEST['email'];

$usuarioDao = new UsuarioDao($conexao);

if ($usuarioDao->existeUsuario($usuario) and $usuarioDao->existeEmail($email)){
    header('location:cadastro.php?cadastrado=ambos');
} elseif ($usuarioDao->existeUsuario($usuario)) {
    header('location:cadastro.php?cadastrado=usuarioExistente');
} elseif ($usuarioDao->existeEmail($email)) {
    header('location:cadastro.php?cadastrado=emailExistente');
} else {
    $usuarioDao->cadastra($usuario, $senha, $email);
    header('location:index.php?cadastrado=1');
}

die();




