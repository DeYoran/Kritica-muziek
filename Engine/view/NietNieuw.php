<?php
namespace Engine\View;

class NietNieuw implements View
{
    
    private $content;

    public function __construct()
    {
        $this->content = "Er bestaat al een account met deze naam";
    }
    
    public function view()
    {
        echo $this->content;
    }
    
}