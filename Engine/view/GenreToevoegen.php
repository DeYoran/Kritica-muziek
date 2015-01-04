<?php
namespace Engine\View;

use Engine\View\View;

class GenreToevoegen implements View
{
    
    private $content;

    public function __construct()
    {
        ob_start();
        include("./Engine/view/pages/genre.php");
        $this->content = ob_get_contents();
        ob_end_clean();
    }
    
    public function view()
    {
        echo $this->content;
    }
}
