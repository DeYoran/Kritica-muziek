<?php
namespace Engine\Controller;
use Engine\Controller\iController;
use Engine\View\View;
use Engine\View\ListView;

abstract class listController implements iController
{
    protected $view;
    
    public function __construct(array $colums, array $rows)
    {
        $this->view = new ListView($colums, $rows);
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
