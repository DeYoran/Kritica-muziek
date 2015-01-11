<?php
namespace Engine\View;

use Engine\View\View;

class AlbumWijzigen implements View
{
    
    private $content;

    public function __construct($album, $genrelist, $artiestlijst)
    {
        ob_start();
        include("./Engine/view/pages/editAlbum.php");
        $this->content = ob_get_contents();
        ob_end_clean();
    }
    
    public function view()
    {
        echo $this->content;
    }
}
