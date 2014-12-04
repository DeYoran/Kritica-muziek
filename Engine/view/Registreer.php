<?php
namespace Engine\View;

use Engine\View\View;

class Registreer implements View
{
    
    private $content;

    public function __construct()
    {
        $this->content = file_get_contents("./Engine/view/pages/registreer.php");
    }
    
    public function view()
    {
        echo $this->content;
    }
}
