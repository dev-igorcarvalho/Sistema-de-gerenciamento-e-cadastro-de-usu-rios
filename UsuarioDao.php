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

    function atualiza($usuario) {
        $nome = mysqli_real_escape_string($this->conexao, $usuario->getNome());
        $senha = mysqli_real_escape_string($this->conexao, $usuario->getSenha());
        $senhaMd5 = md5($senha);
        $email = mysqli_real_escape_string($this->conexao, $usuario->getEmail());
        $query = "UPDATE usuarios SET nome='{$nome}', senha='{$senhaMd5}', email='{$email}' WHERE id={$usuario->getId()}";
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
        $novaSenha = md5("Ns" . date("Ymd"));
        $query = "UPDATE usuarios SET senha='{$novaSenha}' WHERE email='{$usuario->getEmail()}'";
        $resultado = mysqli_query($this->conexao, $query);   
        error_log(mysqli_error($this->conexao));
    }

    function recuperaDados($usuario) {

        $this->resetaSenha($usuario);

        $dados = array();
        $query = "SELECT * FROM usuarios WHERE email='{$usuario->getEmail()}'";
        $resultado = mysqli_query($this->conexao, $query);
        error_log(mysqli_error($this->conexao));
        
        foreach ($array = mysqli_fetch_assoc($resultado) as $item){
            $nome = $array['nome'];
            $senha = "Ns" . date("Ymd");
            array_push($dados, $nome, $senha);
        }
       
        $cabecalho = 'GamerHub';
        $assunto = 'Recuperação de login';  
        $mensagem = "Seu nome de usuario é '{$dados[0]}' e sua nova senha é {$dados[1]}'";
        $destinatario = $usuario->getEmail();
        mail($destinatario, $assunto, $mensagem, $cabecalho);

    }

    function buscaId($usuario) {

        $query = "SELECT * FROM usuarios WHERE nome='{$usuario->getNome()}'";
        $resultado = mysqli_query($this->conexao, $query);
        error_log(mysqli_error($this->conexao));

        foreach ($array = mysqli_fetch_assoc($resultado) as $item){
            $usuario->setId($array['id']);
        }

        return $usuario;
    }

    function buscaUsuarioAntigo($id) {

        $query = "SELECT * FROM usuarios WHERE id={$id}";
        $resultado = mysqli_query($this->conexao, $query);
        error_log(mysqli_error($this->conexao));

        $usuarioAntigo = array();
        
        foreach ($array = mysqli_fetch_assoc($resultado) as $item){
            $nome = $array['nome'];
            $email = ($array['email']);
            array_push($usuarioAntigo, $nome, $email);
        }

        return $usuarioAntigo;

    }

}
    

 













