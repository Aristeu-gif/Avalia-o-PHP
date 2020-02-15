<?php

require_once 'htmlatributosglobais.class.php';

class HtmlP extends HtmlAtributosGlobais {

    private $align = null;
    private $texto = null;

    function geraHtml() {
        $atributosGlobais = parent::geraHtml();

        return "<p{$this->align}>{$this->texto}</p>";
    }

    function setAlign($align) {
        $this->align = " align='" . $align . "'";
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

}
