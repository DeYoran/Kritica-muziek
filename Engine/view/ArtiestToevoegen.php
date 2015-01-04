<?php
namespace Engine\View;

use Engine\View\View;

class ArtiestToevoegen implements View
{
    
    private $content;

    public function __construct($genrelist, $artiestlijst)
    {
        ob_start();
        include("./Engine/view/pages/artiest.php");
        $this->content = ob_get_contents();
        ob_end_clean();
    }
    
    public function view()
    {
        echo $this->content;
    }
}
