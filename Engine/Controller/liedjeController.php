<?php
namespace Engine\Controller;
use Engine\Controller\iController;
use Engine\View\PlayView;
use Engine\View\View;

class liedjeController implements iController
{
    private $view;
    
    public function __construct($entityManager, $nr)
    {
        $nr = intval($nr[0]);
        $liedje = $entityManager->find("Engine\Model\Liedje",$nr);
        $this->view = new playView($liedje);
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
