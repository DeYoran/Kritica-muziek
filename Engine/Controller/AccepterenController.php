<?php
namespace Engine\Controller;

use Engine\Controller\iController;
use Engine\View\View;
use Engine\View\Accepteer;

class AccepterenController implements iController
{
    private $view;
    
    public function __construct($entityManager, $input)
    {
        if(!isset($_SESSION['kr-user']))
        {
            header("Location: /login");
            die();
        }
        else
        {
            $username = $input[0];
            $user = $entityManager->find("Engine\Model\Inlog",$username);
            $user->setToegang(true);
            $entityManager->persist($user);
            $entityManager->flush();
        }
        
        $this->view = new Accepteer();
        header( "refresh:5;url=/" );
        
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