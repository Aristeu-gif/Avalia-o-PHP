<?php

require_once 'htmlatributosglobais.class.php';

class HtmlHead extends HtmlAtributosGlobais {

    private $title;
    private $style;
    private $link;
    private $meta;
    private $script;

    function __construct() {
        $this->title = null;
        $this->style = array();
        $this->link = array();
        $this->meta = array();
        $this->script = array();
    }

    public function geraHtml() {
        $atributosGlobais = parent::geraHtml();

        $head = "<head{$atributosGlobais}>" . $this->title->geraHtml();

        foreach ($this->style as $style) {
            $head .= $style->geraHtml();
        }

        foreach ($this->link as $link) {
            $head .= $link->geraHtml();
        }

        foreach ($this->meta as $meta) {
            $head .= $meta->geraHtml();
        }

        foreach ($this->script as $script) {
            $head .= $script->geraHtml();
        }

        $head .= "</head>";

        return $head;
    }

    function setTitle(HtmlTitle $title) {
        $this->title = $title;
    }

    function addStyle(HtmlStyle $style) {
        $this->style [] = $style;
    }

    function addLink(HtmlLink $link) {
        $this->link [] = $link;
    }

    function addMeta(HtmlMeta $meta) {
        $this->meta [] = $meta;
    }

    function addScript(HtmlScript $script) {
        $this->script [] = $script;
    }

}
