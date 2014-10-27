<?php
namespace Engine\Controller;

use Engine\Controller\iController;
use Engine\Model\Test;

class HomeController implements iController
{
    private $test;
    
    public function __construct($url)
    {
        $this->test = new Test();
    }
    
    public function setView($view)
    {
        
    }
    
    public function getView()
    {
        
    }
    
    public function setTest(Test $test)
    {
        $this->test = $test;
    }
    
}