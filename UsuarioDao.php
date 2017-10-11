<?php

class UsuarioDao 
{
    private $conexao;

    function __construct($conexao){
        $this->conexao=$conexao;
    }

    function existeUsuario($usuario) {
        $nome = mysqli_real_escape_string($this->conexao, $usuario->getNome());
        $query = "SELECT * FROM usuarios WHERE nome='{$nome}'";
        $resultado = mysqli_query($this->conexao, $query);
        error_log(mysqli_error($this->conexao));
        return mysqli_fetch_assoc($resultado);
    }

    function existeEmail($usuario) {
        $email = mysqli_real_escape_string($this->conexao, $usuario->getEmail());
        $query = "SELECT * FROM usuarios WHERE email='{$email}'";
        $resultado = mysqli_query($this->conexao, $query);
        error_log(mysqli_error($this->conexao));
        return mysqli_fetch_assoc($resultado);
       
    }

    function cadastra($usuario) {
        $nome = mysqli_real_escape_string($this->conexao, $usuario->getNome());
        $senha = mysqli_real_escape_string($this->conexao, $usuario->getSenha());
        $senhaMd5 = md5($senha);
        $email = mysqli_real_escape_string($this->conexao, $usuario->getEmail());
        $query = "INSERT INTO usuarios (nome, senha, email) VALUES ('{$nome}', '{$senhaMd5}', '{$email}')";
        $resultado = mysqli_query($this->conexao, $query);
        error_log(mysqli_error($this->conexao));
        return $resultado;
    }
    

    
    function verifica($usuario) {
        $nome = mysqli_real_escape_string($this->conexao, $usuario->getNome());
        $senha = mysqli_real_escape_string($this->conexao, $usuario->getSenha());
        $senha = md5($senha);
        $query = "SELECT * FROM usuarios WHERE nome='{$nome}' AND senha='{$senha}'";
        $resultado = mysqli_query($this->conexao, $query);
        error_log(mysqli_error($this->conexao));
        return mysqli_fetch_assoc($resultado);
    }

    function resetaSenha($usuario) {
        $novaSenha = rand();
        $query = "UPDATE usuarios SET senha='{$novaSenha}' WHERE email='{$usuario->getEmail()}'";
        $resultado = mysqli_query($this->conexao, $query);   
        error_log(mysqli_error($this->conexao));
        return $resultado;

        $cabecalho = 'GamerHub';
        $assunto = 'Recuperação de login';
        $mensagem = "Sua nova senha é '{$novaSenha}'";
        $destinatario = $usuario->getEmail();
        mail($destinatario, $assunto, $mensagem, $cabecalho);
    }

}
    

 













