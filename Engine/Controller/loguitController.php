<?php
namespace Engine\Controller;
use Engine\Controller\iController;
use Engine\View\EmptyPage;
use Engine\View\View;

class loguitController implements iController
{
    
    private $view;

    public function __construct()
    {
        $this->view = new EmptyPage();
        unset($_SESSION['kr-user']);
        header("Location: ./login");
    }


    public function getView()
    {
        return $this->view;
    }

    public function setView(View $view)
    {
        $this->view = $view;
    }

}
