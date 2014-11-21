<?php
namespace Engine\View;

class VerkeerdWachtwoord implements View
{
    
    private $content;

    public function __construct()
    {
        $this->content = "Naam en of wachtword verkeerd";
    }
    
    public function view()
    {
        echo $this->content;
    }
    
}