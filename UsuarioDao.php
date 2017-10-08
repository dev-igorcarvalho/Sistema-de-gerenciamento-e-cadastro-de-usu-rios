<?php

class UsuarioDao 
{
    private $conexao;

    function __construct($conexao){
        $this->conexao=$conexao;
    }

    function existeUsuario($usuario) {
        $usuario = mysqli_real_escape_string($this->conexao, $usuario);
        $query = "SELECT * FROM usuarios WHERE usuario='{$usuario}'";
        $resultado = mysqli_query($this->conexao, $query);
        error_log(mysqli_error($this->conexao));
        return mysqli_fetch_assoc($resultado);
    }

    function existeEmail($email) {
        $email = mysqli_real_escape_string($this->conexao, $email);
        $query = "SELECT * FROM usuarios WHERE email='{$email}'";
        $resultado = mysqli_query($this->conexao, $query);
        error_log(mysqli_error($this->conexao));
        return mysqli_fetch_assoc($resultado);
       
    }

    function cadastra($usuario, $senha, $email) {
        $usuario = mysqli_real_escape_string($this->conexao, $usuario);
        $senha = mysqli_real_escape_string($this->conexao, $senha);
        $senha = md5($senha);
        $email = mysqli_real_escape_string($this->conexao, $email);
        $query = "INSERT INTO usuarios (usuario, senha, email) VALUES ('{$usuario}', '{$senha}', '{$email}')";
        $resultado = mysqli_query($this->conexao, $query);
        error_log(mysqli_error($this->conexao));
        return $resultado;
    }
    

    
    function busca($usuario, $senha) { // ainda n está em uso
        $usuario = mysqli_real_escape_string($this->conexao, $usuario);
        $senha = mysqli_real_escape_string($this->conexao, $usuario);
        $senha = md5($senha);
        $query = "SELECT * FROM usuarios WHERE usuario='{$usuario}' AND senha='{$senha}'";
        $resultado = mysqli_query($this->conexao, $query);
        error_log(mysqli_error($this->conexao));
        return mysqli_fetch_assoc($resultado);
    }














    }