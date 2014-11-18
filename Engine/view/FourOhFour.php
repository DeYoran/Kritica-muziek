<?php
namespace Engine\View;

class FourOhFour implements View
{
    
    private $content;

    public function __construct()
    {
        $this->content = "page not found";
    }
    
    public function view()
    {
        echo $this->content;
    }
    
}