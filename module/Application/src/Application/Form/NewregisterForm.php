<?php

namespace Application\Form;
use Zend\Form\Form;

class NewregisterForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('registers');
        $this->setAttribute('method', 'post');


        $this->add(array(
            'name' => 'reg_name',
            'options' => array(
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Ange namn',
                'class' => 'textfield',
            ),
        ));
		
        $this->add(array(
            'name' => 'reg_desc',
            'options' => array(
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Ange beskrivning',
                'class' => 'textfield',
            ),
        ));

         $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Spara nytt register',
                'class' => 'submitbutton',
            ),
        )); 

    }
}