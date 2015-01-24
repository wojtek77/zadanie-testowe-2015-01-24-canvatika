<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $czyZapisDoBazy = null;
        $form = new Application_Form_Test();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                $values = $form->getValues();
                $uzytkownicyTable = new Application_Model_DbTable_Uzytkownicy();
                $czyZapisDoBazy = $uzytkownicyTable->insert($values);
                if ($czyZapisDoBazy) {
                    //$form->clearElements();
                    //$form->reset();
                    mail($values['email'], 'Hello world!', 'Hello world!');
                }
            }
        }
        $this->view->form = $form;
        $this->view->czyZapisDoBazy = $czyZapisDoBazy;
    }

    public function checkFormAction() {
        $ret = array();
        $form = new Application_Form_Test();
        if ($this->getRequest()->isPost()) {
            if (!$form->isValid($this->getRequest()->getPost())) {
                $ret = $form->getMessages();
            }
        }
        $this->_helper->json($ret);
    }

}
