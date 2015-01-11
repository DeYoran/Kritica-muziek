<?php
namespace Engine\Controller;

use Engine\Controller\iController;
use Engine\View\View;
use Engine\View\Accepteer;

class deleteController implements iController
{
    private $view;
    
    public function __construct($entityManager, $param)
    {
        if(!isset($_SESSION['kr-user']))
        {
            header("Location: /login");
            die();
        }
        if($param[0] == 'nummer'){
            $param[0] = 'liedje';
        }
        $entity = $entityManager->find("Engine\Model\\$param[0]",urldecode($param[1]));
        if(isset($enity)){
            $entityManager->remove($entity);
        }
        $entityManager->flush();
        
        header("Location:$_SERVER[HTTP_REFERER]");
        
    }
    
    public function setView(View $view)
    {
        $this->view = $view;
    }
    
    public function getView()
    {
        return $this->view;
    }
    
}