<?php

require_once 'htmlatributosglobais.class.php';

class HtmlMeta extends HtmlAtributosGlobais {

    private $charset;
    private $content;
    private $httpequiv;
    private $name;

    public function __construct($charset=null, $content=null, $httpequiv=null,$name=null) {
        $this->setCharset($charset);
        $this->setContent($content);
        $this->setHttpequiv($httpequiv);
        $this->setName($name);
        
    }
    
    public function geraHtml() {
        $atributosGlobais = parent::geraHtml();

        return "<meta " . $atributosGlobais . $this->charset . $this->content . $this->httpequiv . 
            $this->name . ">". "</meta>";
    }

    function setCharset($charset) {
        $this->charset = " charset='" . $charset . "'";
    }
    
    function setContent($content) {
        $this->content= " content='" . $content . "'";
    }
    
    function setHttpequiv($httpequiv) {
        $this->httpequiv = " httpequiv='" . $httpequiv . "'";
    }
    
    function setName($name) {
        $this->name = " name='" . $name . "'";
    }

}

