<?php
namespace Engine\View;

class Verschil implements View
{
    
    private $content;

    public function __construct()
    {
        $this->content = "De wachtwoorden zijn niet hetzelfde";
    }
    
    public function view()
    {
        echo $this->content;
    }
    
}