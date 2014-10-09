<?php
namespace Engine\Controller;

use Engine\Controller\iController;

class HomeController implements iController
{
    private $test;
    
    public function __construct($url)
    {
        echo "hello world";
    }
    
    public function setView($view)
    {
        
    }
    
    public function getView()
    {
        
    }
    
}