<?php

require_once '../Views/viewabstract.class.php';

require_once '../Models/matriculamodel.class.php';
require_once '../Models/discentemodel.class.php';
require_once '../Models/cursomodel.class.php';

class EnderecoView extends ViewAbstract {

    protected function montaFieldsetConsulta() {
        return null;
    }



    protected function montaFieldsetDadosDeEntrada($matriculaModel) {
        $form = new HtmlForm();
        $form->setAction("endereco.php");
        $form->setMethod("post");

        $div = new HtmlDiv();

        $label = new HtmlLabel();
        $label->setTexto("Usuario ID");

        $input = new HtmlInput();
        $input->setName("usuarioId");
        $input->setType("text");
        $input->setValue($enderecoModel->getUsuarioId());

        $div->addElementos(array($label, $input));
        $form->addElemento($div);

       
       
        
        $div = new HtmlDiv();

        $label = new HtmlLabel();
        $label->setTexto("Padrao");

        $input = new HtmlInput();
        $input->setName("padrao");
        $input->setType("text");
        $input->setValue($enderecoModel->getPadrao());

        $div->addElementos(array($label, $input));
        $form->addElemento($div);
        
        
        
        $div = new HtmlDiv();

        $label = new HtmlLabel();
        $label->setTexto("Cep");

        $input = new HtmlInput();
        $input->setName("cep");
        $input->setType("text");
        $input->setValue($enderecoModel->getCep());

        $div->addElementos(array($label, $input));
        $form->addElemento($div);
        
        
        $div = new HtmlDiv();

        $label = new HtmlLabel();
        $label->setTexto("Logradouro");

        $input = new HtmlInput();
        $input->setName("logradouro");
        $input->setType("text");
        $input->setValue($enderecoModel->getLogradouro());

        $div->addElementos(array($label, $input));
        $form->addElemento($div);
        
        
         $div = new HtmlDiv();

        $label = new HtmlLabel();
        $label->setTexto("numero");

        $input = new HtmlInput();
        $input->setName("numero");
        $input->setType("text");
        $input->setValue($enderecoModel->getNumero());

        $div->addElementos(array($label, $input));
        $form->addElemento($div);
        
        
         $div = new HtmlDiv();

        $label = new HtmlLabel();
        $label->setTexto("complemento");

        $input = new HtmlInput();
        $input->setName("complemento");
        $input->setType("text");
        $input->setValue($enderecoModel->getComplemento());

        $div->addElementos(array($label, $input));
        $form->addElemento($div);
        
        $div = new HtmlDiv();

        $label = new HtmlLabel();
        $label->setTexto("cidade");

        $input = new HtmlInput();
        $input->setName("cidade");
        $input->setType("text");
        $input->setValue($enderecoModel->getCidade());

        $div->addElementos(array($label, $input));
        $form->addElemento($div);
        
        $div = new HtmlDiv();

        $label = new HtmlLabel();
        $label->setTexto("Uf");

        $input = new HtmlInput();
        $input->setName("uf");
        $input->setType("text");
        $input->setValue($enderecoModel->getUf);

        $div->addElementos(array($label, $input));
        $form->addElemento($div);
        
        //fieldset
        $legend = new HtmlLegend("Dados");
        $fieldset = new HtmlFieldset();
        $fieldset->setLegend($legend);
        $fieldset->addElemento($form);

        return $fieldset;
    }

    public function recebeDadosDaConsulta() {
       
    }

    public function recebeDadosDaEntrada() {
       

        $enderecoModel = new EnderecoModel($_POST["usuarioId"], $_POST["padrao"], $_POST["cep"],$_POST["logradouro"],$_POST["numero"],$_POST["complemento"],$_POST["cidade"],$_POST["uf"]);

        return $enderecoModel;
    }

    private function montaOptionsDosCursos() {

    }

//    private function montaOptionsDasMatriculas() {
//        $options = array();
//
//        $option = new htmlOption(FALSE, "Selecione uma opção.", true, "-1", "Selecione uma opção...");
//
//        $options [] = $option;
//
//        $matriculaModel = new MatriculaModel();
//        $buscou = $matriculas = $matriculaModel->buscaArrayObjetoComPs();
//        if ($buscou) {
//            //continua
//        } else {
//            if ($matriculas === 0) {
//                $this->addMensagem("Nenhum discente cadastrado!");
//                return $options;
//            } else {
//                $this->addMensagem("Erro na busca dos discentes!");
//                return $options;
//            }
//        }
//        $discenteModel = new DiscenteModel();
//
//        foreach ($matriculas as $matriculaModel) {
//            $discenteModel->setDsceCpf($matriculaModel->getMatrDsceCpf());
//            $discenteModel->buscaObjeto();
//
//            $options [] = new htmlOption(FALSE, null, false, $matriculaModel->getMatrId(), $discenteModel->getDsceNome());
//        }
//        return $options;
//    }

  

    public function montaDivDeBotoes() {
        //div dos botões
        $divDeBotoes = new HtmlDiv();

        //botão de inclusão
        $button = new HtmlButton();
        $button->setName("bt");
        $button->setType("submit");
        $button->setValue("salva");
        $button->setConteudo("Salvar");
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
