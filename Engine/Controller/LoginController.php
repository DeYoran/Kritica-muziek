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
            $user = new Inlog();
            $user = $entityManager->find("Engine\Model\Inlog",$_POST['naam']);
            if($user->checkPass($_POST['pass'])){
                $_SESSION['kr-user'] = $user;
                header("Location: /home");
            }
            else{
                echo "wachtwoord incorrect";
                header( "refresh:5;url=/login" );
            }
            $this->view = new EmptyPage();
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
