<?php

require_once 'htmlatributosglobais.class.php';

class HtmlDiv extends HtmlAtributosGlobais{
        
    
    function __construct($align=null) {
        parent::__construct();
    }

    public function geraHtml() {
        $atributosGlobais = parent::geraHtml();

        $div = "<div{$atributosGlobais}>";
        
        $div .= parent::geraHtmlElementos();
        
        $div .= "</div>";
        
        return $div;
    }

}
