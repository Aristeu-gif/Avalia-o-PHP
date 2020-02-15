<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginview
 *
 * @author Aristeu
 */
require_once '../Views/viewabstract.class.php';

class LoginView extends ViewAbstract {

    //put your code here
    protected function montaFieldsetConsulta() {
        return null;
    }

    protected function montaFieldsetDadosDeEntrada($objeto) {
        $form = new HtmlForm();
        $form->setMethod("post");
        
        $div = new HtmlDiv();
        
        $label = new HtmlLabel();
        $label->setTexto("Email");
        
        $div->addElemento($label);
        
        $input = new HtmlInput();
        $input->setName("Email");
        
        $div->addElemento($input);

        $botaoLogin = new htmlButton();
        $botaoLogin->setName("bt");
        $botaoLogin->setValue("login");
        $botaoLogin->setType("submit");
        $botaoLogin->setConteudo("Login");
        

        $div->addElemento($botaoLogin);
        
        $form->addElemento($div);
        
        
        $div = new HtmlDiv();
        
        $label = new HtmlLabel();
        $label->setTexto("Senha");
        
        $div->addElemento($label);
        
        
        
        $input = new HtmlInput();
        $input->setName("senha");
        
        $div->addElemento($input);

        $botaoLogin = new htmlButton();
        $botaoLogin->setName("bt");
        $botaoLogin->setValue("cadastrar");
        $botaoLogin->setType("submit");
        $botaoLogin->setConteudo("Cadastrar");
        
        //$div->addElemento($botaoLogin);
        
        $form->addElemento($div);
        
        $div = new HtmlDiv();
        $div->addElemento($botaoLogin);
        $form->addElemento($div);
        
        return $form;
    }

    public function recebeDadosDaConsulta() {
        return null;
    }

    public function recebeDadosDaEntrada() {
        $usuarioModel = new UsuarioModel();
        $usuarioModel->setEmail($_POST['email']);
        $usuarioModel->setSenha($_POST['senha']);
        return $usuarioModel;
    }

}
