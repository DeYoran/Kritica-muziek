<?php
namespace Engine\Controller;
use Engine\View\View;
use Engine\View\Login;

/**
 * Description of LoginController
 *
 * @author Yoran
 */
class LoginController implements iController
{
    
    private $view;
            
    public function __construct($parameter)
    {
        if($parameter == "Login")
        {
            
        }
        else
        {
            $this->view = new Login();
        }
    }
    
    public function getView()
    {
        return $this->view;
    }

    public function setView(View $view)
    {
        $this->view = $view;
    }

}
