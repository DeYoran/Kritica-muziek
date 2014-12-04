<?php
namespace Engine\View;

class GeenToegang implements View
{
    
    private $content;

    public function __construct()
    {
        $this->content = "U heeft (nog) geen toegang tot deze website";
    }
    
    public function view()
    {
        echo $this->content;
    }
    
}