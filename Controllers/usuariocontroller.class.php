<?php

/**
 * Description of discentecontroller
 *
 * @author aluno
 */
require_once '../ADOs/usuariooado.class.php';
require_once '../Models/usuariomodel.class.php';
require_once '../Views/usuarioview.class.php';
require_once '../Classes/cpf.class.php';


class UsuarioController {

    private $usuarioView;
    private $usuarioModel;
    private $discenteModel;

    function __construct() {
        
       
        $acao = $this->usuarioView->getBt();

        switch ($acao) {
            case "inclui":
                $this->incluiUsuario();

                break;

            case "consulta":
                $this->consultaUsuario();

                break;

            case "altera":
                $this->alteraUsuario();
                break;
            case "exclui":
                $this->excluiUsuario();

                break;

            default:
                break;
        }

        $this->usuarioView->displayInterface($this->usuarioModel);
    }

    function __destruct() {
        unset($this->usuarioView, $sc);
    }

    private function incluiUsuario() {
        //I - receber dados da view
        $this->usuarioModel = $this->usuarioView->recebeDadosDaEntrada();
 

        
        $incluiu = $usuarioModel->insereObjeto();
        echo $incluiu;
        //V - se incluiu então mensagem de ok
        //               senão mensagem de erro
        if ($incluiu) {
            $this->usuarioView->addMensagem("Inclusão bem sucedida!");
        } else {
            $this->usuarioView->addMensagem("Inclusão mal sucedida! Contate o responsável.");
        }
    }

    private function consultaUsuario() {
        //I - receber dados da view
        $this->discenteModel = $this->usuarioView->recebeDadosDaConsulta();

        //II - validar dados
        //III - se dados ok então continua
        //                  senão mensagem de erro e sai
        if (is_null($this->discenteModel->getDsceCpf()) || trim($this->discenteModel->getDsceCpf()) == '') {
            $this->usuarioView->addMensagem("Informe o CPF");
            return;
        }
        //IV - buscar dados do discente no BD

        $consultou = $this->discenteModel->buscaObjeto();


        if ($consultou) {
            $this->usuarioView = new DiscenteViewTela2("Discentes");
            $this->usuarioView->addMensagem("Consulta bem sucedida!");
        } else {
            $this->usuarioView->addMensagem("Consulta mal sucedida! Contate o responsável.");
        }
    }

    private function alteraUsuario() {
        //I - receber dados da view
        $this->discenteModel = $this->usuarioView->recebeDadosDaEntrada();

        //II - validar dados
        //III - se dados ok então continua
        //                  senão mensagem de erro e sai
        if (is_null($this->discenteModel->getDsceCpf()) || trim($this->discenteModel->getDsceCpf()) == '') {
            $this->usuarioView->addMensagem("Você deve informar o cpf");
            return;
        }
        //IV - buscar dados do discente no BD

        $alterou = $this->discenteModel->alteraObjeto();
        //V - se incluiu então mensagem de ok
        //               senão mensagem de erro
        if ($alterou) {
            $this->usuarioView->addMensagem("Alteração bem sucedida!");
            $this->discenteModel = new DiscenteModel();
        } else {
            $this->usuarioView->addMensagem("Alteração mal sucedida! Contate o responsável.");
        }
    }

    private function excluiUsuario() {
        //I - receber dados da view
        $this->usuarioModel = $this->usuarioView->recebeDadosDaEntrada();
        //II - validar dados
        //III - se dados ok então continua
        //                  senão mensagem de erro e sai
        if (is_null($this->usuarioModel->getDsceMatricula()) || trim($this->usuarioModel->getDsceMatricula()) == '') {
            $this->usuarioView->addMensagem("Você deve informar a sua matrícula!");
            return;
        }
        //IV - incluir dados no BD
        echo $excluiu;
        $excluiu = $this->usuarioModel->excluiObjeto();
        //V - se incluiu então mensagem de ok
        //               senão mensagem de erro
        if ($excluiu) {
            $this->usuarioView->addMensagem("Exclusão bem sucedida!");
            $this->discenteModel = new DiscenteModel();
        } else {
            $this->usuarioView->addMensagem("Exclusão mal sucedida! Contate o responsável.");
        }
    }

}
