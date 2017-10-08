<?php 

class Usuario 
{
    private $nome;
    private $senha;
    private $email;

    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function getSenha() {
        return $this->senha;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

}