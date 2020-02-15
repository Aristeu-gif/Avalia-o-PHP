<?php

require_once '../ADOs/matriculaado.class.php';

class MatriculaModel extends MatriculaAdo {

    protected $matrId;
    protected $matrCursCodigo;
    protected $matrDsceCpf;
    protected $matrDt;

    function __construct($matrId = null, $matrCursCodigo = null, $matrDsceCpf = null, $matrDt = null) {
        $this->matrId = $matrId;
        $this->matrCursCodigo = $matrCursCodigo;
        $this->matrDsceCpf = $matrDsceCpf;
        $this->matrDt = $matrDt;
        parent::__construct();
    }

    function getMatrCursCodigo() {
        return $this->matrCursCodigo;
    }

    function getMatrDsceCpf() {
        return $this->matrDsceCpf;
    }

    function getMatrDt() {
        return $this->matrDt;
    }

    function getMatrId() {
        return $this->matrId;
    }

    function setMatrCursCodigo($matrCursCodigo) {
        $this->matrCursCodigo = $matrCursCodigo;
    }

    function setMatrDsceCpf($matrDsceCpf) {
        $this->matrDsceCpf = $matrDsceCpf;
    }

    function setMatrDt($matrDt) {
        $this->matrDt = $matrDt;
    }

    function setMatrId($matrId) {
        $this->matrId = $matrId;
    }

    protected function getAtributosDaClasse() {
        return get_class_vars(get_class());
    }

    public function checaAtributos() {
        $ok = true;

        if (is_null($this->matrDt) || trim($this->matrDt) == '') {
            $this->setMensagem("A data deve ser informada!");
            $ok = false;
        } else {
            if (checkdate(substr($this->matrDt, 5, 2), substr($this->matrDt, 8, 2), substr($this->matrDt, 0, 4))) {
                //continua, data ok.
            } else {
                $this->setMensagem("Data errada!");
                $ok = false;
            }
        }

        return $ok;
    }

}
