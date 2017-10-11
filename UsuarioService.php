<?php

session_start();

class UsuarioService {

    function logaUsuario($usuario) {
        $_SESSION['usuario_logado'] = $usuario->getNome();
    }

    function usuarioLogado () {
        return $_SESSION['usuario_logado'];
    }

    function usuarioEstaLogado (){
        return isset($_SESSION['usuario_logado']);
    }

    function verificaUsuario (){
        if (!$this->usuarioEstaLogado()) {
            header('location:index.php?falhaDeSeguranca=true');
            die();
        }
    }

    function deslogaUsuario() {
        session_destroy();
        header('location:index.php');

    }

}