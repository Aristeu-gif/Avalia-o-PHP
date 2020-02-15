<?php

require_once '../ADOs/usuarioado.class.php';

class UsuarioModel extends UsuarioAdo {

    protected $id;
    protected $nome;
    protected $cpf;
    protected $email;
    protected $senha;

    function __construct($id, $nome, $cpf, $email, $senha) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->senha = $senha;
        
        parent::__construct();
    }

    public function checaAtributos() {
        
    }

    protected function getAtributosDaClasse() {
        return get_class_vars(get_class());
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }


    

}
