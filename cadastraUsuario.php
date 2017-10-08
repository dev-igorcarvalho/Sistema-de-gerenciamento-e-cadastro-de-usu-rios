<?php
require_once "conecta.php";
require_once "autoload.php";

$usuario = $_REQUEST['usuario'];
$senha = $_REQUEST['senha'];

$usuarioDao = new UsuarioDao($conexao);

if ($usuarioDao->existe($usuario)){
    header('location:cadastro.php?cadastrado=0');
} else {
    $usuarioDao->cadastra($usuario, $senha);
    header('location:index.php?cadastrado=1');
}

die();
