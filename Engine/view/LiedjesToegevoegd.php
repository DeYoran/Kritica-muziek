<?php
namespace Engine\View;

class LiedjesToegevoegd implements View
{
    
    private $content;

    public function __construct()
    {
        $this->content = "De liedjes zijn toegevoegd aan de database";
    }
    
    public function view()
    {
        echo $this->content;
    }
    
}