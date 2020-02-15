<?php

require_once '../Views/matriculaview.class.php';

class MatriculaView2 extends EnderecoView {

    public function montaDivDeBotoes() {
        //div dos botões
        $divDeBotoes = new HtmlDiv();

        //botão de alteração
        $button = new HtmlButton();
        $button->setName("bt");
        $button->setType("submit");
        $button->setValue("altera");
        $button->setConteudo("Alterar");
        $divDeBotoes->addElemento($button);
        //botão de exclusão
        $button = new HtmlButton();
        $button->setName("bt");
        $button->setType("submit");
        $button->setValue("exclui");
        $button->setConteudo("Excluir");
        $divDeBotoes->addElemento($button);
        //botão de limpeza
        $button = new HtmlButton();
        $button->setName("bt");
        $button->setType("submit");
        $button->setValue("limpa");
        $button->setConteudo("Limpar");
        $divDeBotoes->addElemento($button);

        return $divDeBotoes;
    }

}
