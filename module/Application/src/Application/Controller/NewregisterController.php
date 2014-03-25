<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\Form\NewregisterForm;
use Application\Form\NewregisterFilter;

use Application\Model\registersTable;

class NewregisterController extends AbstractActionController
{
    public function newregisterAction() 
    {  
        if ($this->islogged() == false) 
        {
            return $this->redirect()->toRoute('home');
        }
        
        $form = new NewregisterForm();
        
        return new ViewModel(array('form' => $form));	
    }

    public function addnewregisterAction() 
    {  
        
        $form = new NewregisterForm();
        $request = $this->getRequest();

            $form->setInputFilter(new NewregisterFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) 
            {

                $data = $form->getData();
                $this->getregistersTable()->SaveRegister($data);
                    return $this->redirect()->toRoute('home');

            }
    
    }

    public function deleteregisterAction() 
    {    
        //Hämta variabel som ska raderas från routen
        $id = (int) $this->params()->fromRoute('id', 0);

        $this->getregistersTable()->DeleteRegister($id);   
            return $this->redirect()->toRoute('home');

    }

    public function islogged() 
    {   
        if (!$this->zfcUserAuthentication()->hasIdentity()) 
        {
            return false;
        }
        else 
        {
            return true;
        }
    }

    public function getregistersTable()
    {
        $registersTable = new registersTable;
        return $registersTable;
    }

}
