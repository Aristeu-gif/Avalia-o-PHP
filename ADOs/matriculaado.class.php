<?php

require_once '../Models/modelabstract.class.php';

abstract class MatriculaAdo extends ModelAbstract {

    public function __construct() {
        $this->setNomeDaTabela("endereco");

        parent::__construct();
    }

    public function buscaObjeto() {
        $where = "id = ?";
        return $this->buscaObjetoComPs(array($this->id), $where);
    }

    public function alteraObjeto() {
        $arrayDeColunasEValores = array(
            "usuario" => $this->getMatrDt(),
            "matrDsceCpf"=> $this->getMatrDsceCpf(),
            "matrCursCodigo"=>$this->getMatrCursCodigo()
        );

        $where = " matrId = ? ";

        $query = $this->montaUpdateDoObjetoPS($this->getNomeDaTabela(), $arrayDeColunasEValores, $where);
        
        $arrayDeColunasEValores ["matrId"] = $this->getMatrId();

        return $this->executaPs($query, $arrayDeColunasEValores);
    }

    public function excluiObjeto() {
        $query = $this->montaDeleteUsandoAndDoObjetoPS(array('matrId' => $this->getMatrId()));

//        $query = " delete from " . $this->getNomeDaTabela() . " where dsceMatricula = ? ";

        return $this->executaPs($query, array($this->getMatrId()));
    }

//    public function insereObjeto() {
////        $query = "insert into Discentes (dsceMatricula, dsceNome, dsceCpf, dsceDtNasc) values (?,?,?,?)";
////        $dados = $this->getArrayDeDadosDaClasse();
////        $resultado = $this->executaPs($query, $dados);
////        return $resultado;
//        return $this->executaInsersaoParametrizada ();
//    }
}
