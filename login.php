<?php

require_once "conecta.php";
require_once "autoload.php";


$nome = $_POST['nome'];
$senha = $_POST['senha'];


$usuarioDao = new UsuarioDao($conexao);
$usuarioService = new UsuarioService();

if ($usuarioDao->verifica($nome, $senha)){
        $usuarioService->logaUsuario($nome);
        header('location:paginaInicial.php?login=1');   
} else {
    header('location:index.php?login=0');
}
    
die();
