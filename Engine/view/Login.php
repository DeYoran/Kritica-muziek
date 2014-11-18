<?php
namespace Engine\View;

use Engine\View\View;

class Login implements View
{
    
    private $content;

    public function __construct()
    {
        $this->content = file_get_contents("./Engine/view/pages/login.php");
    }
    
    public function view()
    {
        echo $this->content;
    }
}
