<?php

require_once "conecta.php";
require_once "autoload.php";

$usuario = new Usuario();
$usuarioDao = new UsuarioDao($conexao);

$usuario->setEmail($_REQUEST['email']);

if (!$usuario->getEmail() == "") {

    if ($usuarioDao->existeEmail($usuario)){
        $usuarioDao->recuperaDados($usuario);
        header("location:esqueceuSenha.php?enviado=1");
    } else {
        header("location:esqueceuSenha.php?enviado=0");
    }

} else {
    header("location:esqueceuSenha.php?campoVazio=1");
}

