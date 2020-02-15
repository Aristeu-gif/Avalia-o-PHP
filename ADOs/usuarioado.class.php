<?php

require_once '../Models/modelabstract.class.php';

abstract class UsuarioAdo extends ModelAbstract {

    public function __construct() {
        $this->setNomeDaTabela("usuario");

        parent::__construct();
    }

    public function buscaObjeto() {

        $where = " id = ? ";
        return $this->buscaObjetoComPs(array($this->id), $where);
    }

    public function alteraObjeto() {
        $arrayDeColunasEValores = array(
            "nome" => $this->getNome(),
            "cpf" => $this->getCpf(),
            "email" => $this->getEmail(),
            "senha" => $this->getSenha(),
            
        );

        $where = " id = ? ";

        $query = $this->montaUpdateDoObjetoPS($this->getNomeDaTabela(), $arrayDeColunasEValores, $where);
        
        $arrayDeColunasEValores ["id"] = $this->getId();

        return $this->executaPs($query, $arrayDeColunasEValores);
    }

    public function excluiObjeto() {
        $query = $this->montaDeleteUsandoAndDoObjetoPS(array('id' => $this->getId()));


        return $this->executaPs($query, array($this->getId()));
    }


}
