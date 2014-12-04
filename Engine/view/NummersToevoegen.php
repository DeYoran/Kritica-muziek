<?php
namespace Engine\View;

use Engine\View\View;

class NummersToevoegen implements View
{
    
    private $content;

    public function __construct($liedjes, $genres, $naam, $albumartiest, $artiesten, $allegenres, $albumnummer)
    {
        ob_start();
        include("./Engine/view/pages/nummers.php");
        $this->content = ob_get_contents();
        ob_end_clean();
    }
    
    public function view()
    {
        echo $this->content;
    }
}
