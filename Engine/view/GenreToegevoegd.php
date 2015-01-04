<?php
namespace Engine\View;

class GenreToegevoegd implements View
{
    
    private $content;

    public function __construct()
    {
        $this->content = "Het genre is toegevoegd aan de database";
    }
    
    public function view()
    {
        echo $this->content;
    }
    
}