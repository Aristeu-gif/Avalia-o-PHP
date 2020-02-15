<?php

require_once '../ADOs/discenteado.class.php';

//require_once 'modelinterface.class.php';
//require_once '../ADOs/adopdoabstract.class.php';

class DiscenteModel extends DiscenteAdo {

    protected $dsceCpf;
    protected $dsceNome;
    protected $dsceRg;
    protected $dsceOrgaoExp;
    protected $dsceUfOE;
    protected $dsceDtNasc;
    protected $dsceFone;
    protected $dsceEnd;
    protected $dsceCidade;
    protected $dsceUf;

    function __construct($dsceCpf = null, $dsceNome = null, $dsceRg = null, $dsceOrgaoExp = null, $dsceUfOE = null, $dsceDtNasc = null, $dsceFone = null, $dsceEnd = null, $dsceCidade = null, $Uf = null) {
        $this->dsceCpf = $dsceCpf;
        $this->dsceNome = $dsceNome;
        $this->dsceRg = $dsceRg;
        $this->dsceOrgaoExp = $dsceOrgaoExp;
        $this->dsceUfOE = $dsceUfOE;
        $this->dsceDtNasc = $dsceDtNasc;
        $this->dsceFone = $dsceFone;
        $this->dsceEnd = $dsceEnd;
        $this->dsceCidade = $dsceCidade;
        $this->dsceUf = $Uf;
        parent::__construct();
    }

    public function checaAtributos() {
        $dadosOk = true;

        if (is_null($this->dsceNome) || trim($this->dsceNome) == '') {
            $dadosOk = false;
            $this->addMensagem("O nome do discente deve ser um informado!");
        }if (trim($this->dsceCpf) == '' || is_null($this->dsceCpf)) {
            $dadosOk = false;
            $this->addMensagem("O CPF deve ser informado");
        } else {
            if ($this->validaCPF($this->dsceCpf) === false) {
                $dadosOk = false;
                $this->addMensagem("O CPF informado deve ser válido!");
            }
        }

        if (is_null($this->dsceRg) || trim($this->dsceRg) == "") {
            $dadosOk = false;
            $this->addMensagem("É necessário informar o RG");
        }
        
        if (is_null($this->dsceCidade) || trim($this->dsceCidade) == "") {
            $dadosOk = false;
            $this->addMensagem("É necessário informar a cidade");
        }
        
        if (is_null($this->dsceOrgaoExp) || trim($this->dsceOrgaoExp) == "" || $this->dsceOrgaoExp == '-1') {
            $dadosOk = false;
            $this->addMensagem("É necessário informar o orgão expedidor");
        }
        
        if (is_null($this->dsceUf) || trim($this->dsceUf) == "" || $this->dsceUf == '-1') {
            $dadosOk = false;
            $this->addMensagem("É necessário informar a Universidade Federativa");
        }
        
        if (is_null($this->dsceUfOE) || trim($this->dsceUfOE) == "" || $this->dsceUfOE == '-1') {
            $dadosOk = false;
            $this->addMensagem("É necessário informar a Universidade Federativa do Orgão expedidor");
        }
        
        if (is_null($this->dsceEnd) || trim($this->dsceEnd) == "") {
            $dadosOk = false;
            $this->addMensagem("É necessário informar o Endereço");
        }
        
        if (is_null($this->dsceFone) || trim($this->dsceFone) == "") {
            $dadosOk = false;
            $this->addMensagem("É necessário informar o telefone");
        }

        return $dadosOk;
    }

    function validaCPF($cpf = null) {

        // Verifica se um número foi informado
        if (empty($cpf)) {
            return false;
        }

        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' ||
                $cpf == '11111111111' ||
                $cpf == '22222222222' ||
                $cpf == '33333333333' ||
                $cpf == '44444444444' ||
                $cpf == '55555555555' ||
                $cpf == '66666666666' ||
                $cpf == '77777777777' ||
                $cpf == '88888888888' ||
                $cpf == '99999999999') {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }

    function getDsceNome() {
        return $this->dsceNome;
    }

    function getDsceCpf() {
        return $this->dsceCpf;
    }

    function getDsceDtNasc() {
        return $this->dsceDtNasc;
    }

    function setDsceMatricula($dsceMatricula) {
        $this->dsceMatricula = $dsceMatricula;
    }

    function setDsceNome($dsceNome) {
        $this->dsceNome = $dsceNome;
    }

    function setDsceCpf($dsceCpf) {
        $this->dsceCpf = $dsceCpf;
    }

    function setDsceDtNasc($dsceDtNasc) {
        $this->dsceDtNasc = $dsceDtNasc;
    }

    function getDsceRg() {
        return $this->dsceRg;
    }

    function getDsceCidade() {
        return $this->dsceCidade;
    }

    function getDsceOrgaoExp() {
        return $this->dsceOrgaoExp;
    }

    function getDsceUf() {
        return $this->dsceUf;
    }

    function getDsceUfOE() {
        return $this->dsceUfOE;
    }

    function getDsceEnd() {
        return $this->dsceEnd;
    }

    function getDsceFone() {
        return $this->dsceFone;
    }

    function setDsceRg($dsceRg) {
        $this->dsceRg = $dsceRg;
    }

    function setDsceCidade($dsceCidade) {
        $this->dsceCidade = $dsceCidade;
    }

    function setDsceOrgaoExp($dsceOrgaoExp) {
        $this->dsceOrgaoExp = $dsceOrgaoExp;
    }

    function setDsceUf($dsceUf) {
        $this->dsceUf = $dsceUf;
    }

    function setDsceUfOE($dsceUfOE) {
        $this->dsceUfOE = $dsceUfOE;
    }

    function setDsceEnd($dsceEnd) {
        $this->dsceEnd = $dsceEnd;
    }

    function setDsceFone($dsceFone) {
        $this->dsceFone = $dsceFone;
    }

//    protected function getAtributosDaClasse($nomeDaClasseModel = __CLASS__) {
//        return parent::getAtributosDaClasse($nomeDaClasseModel);
//    }
//
//    public function getArrayDeDadosDaClasse($nomeDaClasseModel = __CLASS__) {
//        return parent::getArrayDeDadosDaClasse($nomeDaClasseModel);
//    }


    protected function getAtributosDaClasse() {
        return get_class_vars(get_class());
    }

//
//    public function getArrayDeDadosDaClasse () {
//        //recupera todos os atributos desta classe para um array.
//        $arrayDeDadosDaClasse = $this->getAtributosDaClasse ();
//
//        //varre o array com os atributos e alimenta-o com os dados contidos nos 
//        //atributos desta classe.
//        foreach ($arrayDeDadosDaClasse as $atributo => $dado) {
//            $arrayDeDadosDaClasse[$atributo] = $this->$atributo;
//        }
//
//        //retorna o array com os atributos e dados desta classe.
//        return $arrayDeDadosDaClasse;
//    }
}
