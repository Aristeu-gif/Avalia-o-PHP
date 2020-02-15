<?php

require_once '../Views/viewabstract.class.php';

require_once '../Models/usuariomodel.class.php';

class UsuarioView extends ViewAbstract {

    protected function montaFieldsetConsulta() {
        
    }

    protected function montaFieldsetDadosDeEntrada($usuarioModel) {
        $form = new HtmlForm();
        $form->setAction("usuario.php");
        $form->setMethod("post");

        
        $label = new HtmlLabel();
        $label->setTexto("nome");
        $input = new HtmlInput();
        $input->setName("nome");
        $input->setType("text");
        $input->setValue($usuarioModel->getNome());

        $div = new HtmlDiv();
        $div->addElementos(array($label, $input));

        $form->addElemento($div);

        
        $label = new HtmlLabel();
        $label->setTexto("cpf");
        $input = new HtmlInput();
        $input->setName("cpf");
        $input->setType("text");
        $input->setValue($usuarioModel->getCpf());

        $div = new HtmlDiv();
        $div->addElementos(array($label, $input));

        $form->addElemento($div);
        
        $label = new HtmlLabel();
        $label->setTexto("email");
        $input = new HtmlInput();
        $input->setName("email");
        $input->setType("text");
        $input->setValue($usuarioModel->getEmail());

        $div = new HtmlDiv();
        $div->addElementos(array($label, $input));

        $form->addElemento($div);
        
        $label = new HtmlLabel();
        $label->setTexto("senha");
        $input = new HtmlInput();
        $input->setName("senha");
        $input->setType("text");
        $input->setValue($usuarioModel->getSenha());

        $div = new HtmlDiv();
        $div->addElementos(array($label, $input));

        $form->addElemento($div);
        
       
        $fieldset = new HtmlFieldset();
        $fieldset->setLegend($legend);
        $fieldset->addElemento($form);


        return $fieldset;
    }

  

    public function recebeDadosDaEntrada() {

        $usuarioModel = new UsuarioModel($_POST["nome"], $_POST["cpf"], $_POST["email"], $_POST["senha"]);
       
        return $usuarioModel;
    }

    public function recebeDadosDaConsulta() {
        
    }

}
