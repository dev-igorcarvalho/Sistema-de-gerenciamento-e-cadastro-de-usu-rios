<?php

require_once "autoload.php";
$usuarioService = new UsuarioService();

$usuarioService->deslogaUsuario();

die();