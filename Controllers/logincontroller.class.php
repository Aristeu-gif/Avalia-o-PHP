<?php

require_once '../Views/loginview.php';
require_once '../Models/usuariomodel.class.php';

class LoginController {

    private $loginView;

    function __construct () {
        $this->loginView = new LoginView ("Login");

        $acao = $this->loginView->getBt ();

        switch ($acao) {
            case "login":


                $this->logar ();


                break;
            default :

                $_SESSION ['logado'] = false;

                session_destroy ();
                break;
        }

        $this->loginView->displayInterface (null);
    }

    function __destruct () {
        unset ($this->loginView);
    }

    private function logar () {
        // Faz uma verificação a fim de evitar que se inicie as sessões novamente
        // quando já foram iniciadas anteriormente
        if (session_status () == PHP_SESSION_ACTIVE) {
            $this->loginView->addMensagem ("Você já está logado.");
        } else {
            $usuarioModel = $this->loginView->recebeDadosDaEntrada();
            $loginOk = $this->checaLogin($usuarioModel);
            if ($loginOk){
                if (session_start ()) {
                    $_SESSION['logado'] = true;
                    $_SESSION['email'] = $usuarioModel->getEmail();
                    $_SESSION['senha'] = $usuarioModel->getSenha();
                    
                    $this->loginView->addMensagem ("Login realizado com sucesso.");
                } else {
                    $this->loginView->addMensagem ("Oh, Ou! Erro no login.");
                }
            } else {
                $this->loginView->addMensagem ("Oh, Ou! O CPF informado não foi encontrado. Tente novamente.");
            }
        }
    }
    
    private function checaLogin($email) {
        $usuarioModel = new UsuarioModel();
        $usuarioModel->setEmail($email);
        $buscou = $usuarioModel->buscaObjeto();
        
        if ($buscou && $usuarioModel->getSenha()== $this->loginView->recebeDadosDaEntrada()->getSenha()) {
            return true;
        } else {
            return false;
        }
    }
    private function cadastrar(){
        header("location: usuarioController.php");
    }

}
