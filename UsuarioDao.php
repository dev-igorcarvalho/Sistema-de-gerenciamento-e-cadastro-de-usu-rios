<?php

class UsuarioDao 
{
    private $conexao;

    function __construct($conexao){
        $this->conexao=$conexao;
    }

    function existe($usuario) {
        $usuario = mysqli_real_escape_string($this->conexao, $usuario);
        $query = "SELECT * FROM usuarios WHERE usuario='{$usuario}'";
        $resultado = mysqli_query($this->conexao, $query);
        error_log(mysqli_error($this->conexao));
        return mysqli_fetch_assoc($resultado);
       
    }

    function cadastra($usuario, $senha) {
        $usuario = mysqli_real_escape_string($this->conexao, $usuario);
        $senha = mysqli_real_escape_string($this->conexao, $senha);
        $senha = md5($senha);
        $query = "INSERT INTO usuarios (usuario, senha) VALUES ('{$usuario}', '{$senha}')";
        $resultado = mysqli_query($this->conexao, $query);
        error_log(mysqli_error($this->conexao));
        return $resultado;
    }
    
    function busca($usuario, $senha) {
        $usuario = mysqli_real_escape_string($this->conexao, $usuario);
        $senha = mysqli_real_escape_string($this->conexao, $usuario);
        $senha = md5($senha);
        $query = "SELECT * FROM usuarios WHERE usuario='{$usuario}' AND senha='{$senha}'";
        $resultado = mysqli_query($this->conexao, $query);
        error_log(mysqli_error($this->conexao));
        return mysqli_fetch_assoc($resultado);
    }














    }