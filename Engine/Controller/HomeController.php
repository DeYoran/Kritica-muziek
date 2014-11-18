<?php
namespace Engine\Controller;

use Engine\Controller\iController;
use Engine\View\View;
use Engine\View\Home;

class HomeController implements iController
{
    private $view;
    
    public function __construct()
    {
        if(!isset($_SESSION['kr-user']))
        {
            header("Location: ./login");
            die();
        }
        else
        {
            var_dump($_SESSION);
            //code continues normally
        }
        
        
        
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