<?php
namespace Engine\View;

class ArtiestToegevoegd implements View
{
    
    private $content;

    public function __construct()
    {
        $this->content = "De artiest is toegevoegd aan de database";
    }
    
    public function view()
    {
        echo $this->content;
    }
    
}