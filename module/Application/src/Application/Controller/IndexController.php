<?php


namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\Model\registersTable;

class IndexController extends AbstractActionController
{
    public function indexAction() 
    {  
        $results = $this->getregistersTable()->showAll();
        return new ViewModel(array('result' => $results));	
    }

    public function getregistersTable()
    {
        $registersTable = new registersTable;
        return $registersTable;
    }


}
