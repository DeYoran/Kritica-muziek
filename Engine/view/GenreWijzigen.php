<?php
namespace Engine\View;

use Engine\View\View;

class GenreWijzigen implements View
{
    
    private $content;

    public function __construct($genre)
    {
        ob_start();
        include("./Engine/view/pages/editGenre.php");
        $this->content = ob_get_contents();
        ob_end_clean();
    }
    
    public function view()
    {
        echo $this->content;
    }
}
