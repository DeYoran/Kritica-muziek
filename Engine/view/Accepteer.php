<?php
namespace Engine\View;

class Accepteer implements View
{
    
    private $content;

    public function __construct()
    {
        $this->content = "De gebruiker is toegelaten";
    }
    
    public function view()
    {
        echo $this->content;
    }
    
}