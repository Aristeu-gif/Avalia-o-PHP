<?php

require_once '../Views/matriculaview.class.php';
require_once '../Views/matriculaview2.php';
require_once '../Models/matriculamodel.class.php';

//require_once '../ADOs/discenteado.class.php';

class EnderecoController {

    private $enderecoView;
    private $enderecoModel;

    function __construct() {
        $this->enderecoView = new EnderecoView("Endereco");

        if ($this->loginOk()) {
            //contnua
            $this->enderecoView->addMensagem("Logado!");
        } else {
            $this->enderecoView->addMensagem("Voçê não está logado!");
            $this->enderecoView->displayInterface($this->enderecoModel);
            return;
        }

        $this->enderecoModel = new EnderecoModel();
        $this->enderecoModel->setUsuarioId($_SESSION['usuarioId']);

        $acao = $this->enderecoView->getBt();

        switch ($acao) {
            case "salva":
                $this->salva();

                break;


            case "limpa":

                break;

            default:
                break;
        }

        $this->enderecoView->displayInterface($this->enderecoModel);
    }

    private function loginOk() {
        if (session_start()) {
            //continua
        } else {
            session_destroy();
            return false;
        }

        if (isset($_SESSION['logado'])) {
            //continua
        } else {
            session_destroy();
            return false;
        }

        return $_SESSION ['logado'];
    }

    function __destruct() {
        unset($this->enderecoView, $sc);
    }

    private function salva() {
        //I - receber dados da view
        $this->enderecoModel = $this->enderecoView->recebeDadosDaEntrada();

        //II - validar dados
        //III - se dados ok então continua
        //                  senão mensagem de erro e sai
        //IV - incluir dados no BD
        //var_dump($this->cursoModel);
        $incluiu = $this->enderecoModel->insereObjeto();
        //V - se incluiu então mensagem de ok
        //               senão mensagem de erro
        if ($incluiu) {
            $this->enderecoView->addMensagem("Inclusão bem sucedida!");
        } else {
            $this->enderecoView->addMensagem("Inclusão mal sucedida! Contate o responsável.");
        }
    }

}
