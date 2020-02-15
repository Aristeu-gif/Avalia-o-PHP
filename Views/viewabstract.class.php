<?php

require_once 'htmlhtml.class.php';
require_once 'htmlhead.class.php';
require_once 'htmllink.class.php';
require_once 'htmlbody.class.php';
require_once 'htmldiv.class.php';
require_once 'htmlp.class.php';
require_once 'htmltitle.class.php';
require_once 'htmlfieldset.class.php';
require_once 'htmllegend.class.php';
require_once 'htmlstyle.class.php';
require_once 'htmllink.class.php';
require_once 'htmlmeta.class.php';
require_once 'htmlscript.class.php';
require_once 'htmlnoscript.class.php';
require_once 'htmlbody.class.php';
require_once 'htmlp.class.php';
require_once 'htmlbr.class.php';
require_once 'htmldiv.class.php';
require_once 'htmlform.class.php';
require_once 'htmlinput.class.php';
require_once 'htmllabel.class.php';
require_once 'htmltextarea.class.php';
require_once 'htmloption.class.php';
require_once 'htmlbutton.class.php';
require_once 'htmlselect.class.php';
require_once 'htmlTd.class.php';
require_once 'htmlTh.class.php';
require_once 'htmlTr.class.php';
//require_once 'htmlh1.class.php';

abstract class ViewAbstract {

    private $bt;
    private $mensagens;
    private $title;
    //tags HTML
    private $html;
    private $htmlHead;
    private $htmlBody;
    //Divisões da interface
    private $htmlDivCabecalho;
    private $htmlDivMenu;
    private $htmlDivCorpo;
    private $htmlDivRodape;

    public function __construct($titulo) {
        $this->bt = null;
        $this->mensagens = array();
        $this->title = new HtmlTitle($titulo);
    }

    public function displayInterface($objeto) {
        $this->montaHmtl($objeto);

        echo $this->html->geraHtml();
    }

    private function montaHmtl($objeto) {
        $this->montaHead();
        $this->montaBody($objeto);

        $this->html = new HtmlHtml();
        $this->html->setHead($this->htmlHead);
        $this->html->setBody($this->htmlBody);
    }

    private function montaHead() {
        $this->htmlHead = new HtmlHead();
        $this->htmlHead->setTitle($this->title);

        $link = new HtmlLink();
        $link->setRel("stylesheet");
        $link->setType("text/css");
        $link->setHref("/PW-ExemploLogin/CSS/estilo.css");

        $this->htmlHead->addLink($link);
    }

    private function montaBody($objeto) {
        $this->htmlBody = new HtmlBody();

        $this->montaDivCabecalho();
        $this->montaDivMenu();
        $this->montaDivCorpo($objeto);
        $this->montaDivRodape();

        $this->htmlBody->addElemento($this->htmlDivCabecalho);
        $this->htmlBody->addElemento($this->htmlDivMenu);
        $this->htmlBody->addElemento($this->htmlDivCorpo);
        $this->htmlBody->addElemento($this->htmlDivRodape);
    }

    private function montaDivCabecalho() {
        $this->htmlDivCabecalho = new HtmlDiv();
        $this->htmlDivCabecalho->setId("cabecalho");

        $p = new HtmlP();
        $p->setTexto("Cabe&ccedil;alho");

        $this->htmlDivCabecalho->addElemento($p);
    }

    private function montaDivMenu() {
        $this->htmlDivMenu = new HtmlDiv();
        $this->htmlDivMenu->setId("menu");

        $p = new HtmlP();
        $p->addElemento("Menu");

        $ul = "<ul>
                    <li><a href='#'>Op&ccedil;&atilde;o 1</a></li>
                    <li><a href='#'>Op&ccedil;&atilde;o 2</a></li>
                    <li><a href='#'>Op&ccedil;&atilde;o 3</a></li>
                </ul>";

        $this->htmlDivMenu->addElemento($p);
        $this->htmlDivMenu->addElemento($ul);
    }

    protected function montaDivCorpo($objeto) {
        $this->htmlDivCorpo = new HtmlDiv();
        $this->htmlDivCorpo->setId("corpo");

        //prepara os fieldsets
        $fieldsetConsulta = $this->montaFieldsetConsulta();
        $fieldsetDadosDeEntrada = $this->montaFieldsetDadosDeEntrada($objeto);

        //monta a div do corpo
        $this->htmlDivCorpo->addElementos($this->getMensagens());
        $this->htmlDivCorpo->addElemento($fieldsetConsulta);
        $this->htmlDivCorpo->addElemento(new HtmlBr());
        $this->htmlDivCorpo->addElemento($fieldsetDadosDeEntrada);
    }

    abstract protected function montaFieldsetConsulta();

    abstract protected function montaFieldsetDadosDeEntrada($objeto);

    private function montaDivRodape() {
        $this->htmlDivRodape = new HtmlDiv();
        $this->htmlDivRodape->setId("rodape");

        $p = new HtmlP();
        $p->setTexto("Aqui é o Rodapé!");

        $this->htmlDivRodape->addElemento($p);
    }

    abstract public function recebeDadosDaConsulta();

    abstract public function recebeDadosDaEntrada();

    function getBt() {
        if (isset($_POST ['bt'])) {
            return $this->bt = $_POST ['bt'];
        } else {
            return null;
        }
    }

    function setBt($bt) {
        $this->bt = $bt;
    }

    function getMensagens() {
        $mensagens = array();

        foreach ($this->mensagens as $mensagem) {
            $htmlP = new HtmlP();
            $htmlP->setTexto($mensagem);
            $mensagens [] = $htmlP;
        }

        return $mensagens;
    }

    function addMensagem($mensagem) {
        $this->mensagens [] = $mensagem;
    }

    function addMensagens(array $mensagens) {
        foreach ($mensagens as $mensagem) {
            $this->addMensagem($mensagem);
        }
    }

//    abstract public function montaDivDeBotoes();
    public function montaDivDeBotoes() {
        //div dos botões
        $divDeBotoes = new HtmlDiv();

        //botão de inclusão
        $button = new HtmlButton();
        $button->setName("bt");
        $button->setType("submit");
        $button->setValue("inclui");
        $button->setConteudo("Incluir");
        $divDeBotoes->addElemento($button);
        //botão de limpeza
        $button = new HtmlButton();
        $button->setName("bt");
        $button->setType("submit");
        $button->setValue("limpa");
        $button->setConteudo("Limpar");
        $divDeBotoes->addElemento($button);
//        //botão de alteração
//        $button = new HtmlButton();
//        $button->setName("bt");
//        $button->setType("submit");
//        $button->setValue("altera");
//        $button->setConteudo("Alterar");
//        $divDeBotoes->addElemento($button);
//        //botão de exclusão
//        $button = new HtmlButton();
//        $button->setName("bt");
//        $button->setType("submit");
//        $button->setValue("exclui");
//        $button->setConteudo("Excluir");
//        $divDeBotoes->addElemento($button);

        return $divDeBotoes;
    }

}
