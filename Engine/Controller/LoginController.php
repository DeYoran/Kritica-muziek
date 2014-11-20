<?php
namespace Engine\Controller;
use Engine\View\View;
use Engine\View\Login;
use Engine\View\EmptyPage;
use Engine\Model\Inlog;

/**
 * Description of LoginController
 *
 * @author Yoran
 */
class LoginController implements iController
{
    
    private $view;
            
    public function __construct($entityManager)
    {
        if(isset($_POST['naam']))
        {
            $user = $entityManager->find("Engine\Model\Inlog",$_POST['naam']);
            $this->view = new EmptyPage();
            var_dump($user);
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
