<?php

require_once "conecta.php";
require_once "autoload.php";

$usuario = new Usuario();

$usuario->setNome($_REQUEST['nome']);
$usuario->setSenha($_REQUEST['senha']);


$usuarioDao = new UsuarioDao($conexao);
$usuarioService = new UsuarioService();

if ($usuarioDao->verifica($usuario)){
    $usuarioService->logaUsuario($usuario);
    header('location:paginaInicial.php?login=1');   
} else {
    header('location:index.php?login=0');
}
    
die();
