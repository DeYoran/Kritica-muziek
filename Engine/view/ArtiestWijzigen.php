<?php
namespace Engine\View;

use Engine\View\View;

class ArtiestWijzigen implements View
{
    
    private $content;

    public function __construct($artiest, $genrelist, $artiestlijst)
    {
        ob_start();
        include("./Engine/view/pages/editartiest.php");
        $this->content = ob_get_contents();
        ob_end_clean();
    }
    
    public function view()
    {
        echo $this->content;
    }
}
