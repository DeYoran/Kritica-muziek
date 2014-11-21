<?php
namespace Engine\View;

class EmptyPage implements View
{
    
    private $content;

    public function __construct()
    {
        $this->content = " ";
    }
    
    public function view()
    {
        echo $this->content;
    }
    
}