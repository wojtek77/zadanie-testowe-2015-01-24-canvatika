<?php

class Application_Form_Test extends Zend_Form {

    public function init() {
        
        $element = new Zend_Form_Element_Text('imie');
        $element->setLabel('Imię');
        $element->setRequired();
        $this->addElement($element);
        
        $element = new Zend_Form_Element_Text('nazwisko');
        $element->setLabel('Nazwisko');
        $element->setRequired();
        $this->addElement($element);
        
        /* tu jest pole "Zend_Form_Element_Text" zamiast "Zend_Form_Element_Password" aby bylo latwiej testowac */
        $element = new Zend_Form_Element_Text('haslo');
        $element->setLabel('Hasło');
        $element->setRequired();
        $element->addValidators(array(
            array('Regex', false, array('pattern' => '/(?=.*[A-Z])(?=.*[0-9])(?=.{5,})/')),
        ));
        $this->addElement($element);
        
        $element = new Zend_Form_Element_Text('email');
        $element->setLabel('Adres e-mail');
        $element->setRequired();
        $this->addElement($element);
        $element->addValidators(array(
            array('EmailAddress'),
        ));
        
        $this->addElement(new Zend_Form_Element_Submit('submit', array('label' => 'Wyślij')));
        
        /* ustawienie dla wszystkich elementow filtrow */
        $this->setElementFilters(array('StringTrim'));
    }
}
