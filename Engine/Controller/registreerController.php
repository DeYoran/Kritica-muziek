<?php
namespace Engine\Controller;
use Engine\View\View;
use Engine\View\Registreer;
use Engine\View\EmptyPage;
use Engine\View\VerkeerdWachtwoord;
use Engine\Model\Inlog;

/**
 * Description of LoginController
 *
 * @author Yoran
 */
class registreerController implements iController
{
    
    private $view;
            
    public function __construct($entityManager)
    {
        if(isset($_POST['naam']))
        {
            if($entityManager->find("Engine\Model\Inlog",$_POST['naam']) != null){
                die();
            }
            if($_POST['pass1'] != $_POST['pass2']){
                die();
            }
            $user = new Inlog();
            $user->setNaam($_POST['naam']);
            $user->setPass($_POST['pass1']);
            $user->setToegang(false);
            $entityManager->persist($user);
            $entityManager->flush();
            var_dump($user);
            die();
            $this->view = new EmptyPage();
        }
        else
        {
            $this->view = new Registreer();
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
