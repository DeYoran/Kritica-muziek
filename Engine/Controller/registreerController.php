<?php
namespace Engine\Controller;
use Engine\View\View;
use Engine\View\Registreer;
use Engine\View\Geregistreerd;
use Engine\View\NietNieuw;
use Engine\View\Verschil;
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
        if(isset($_SESSION['kr-user'])){
            header("Location: /home");
        }
        if(isset($_POST['naam']))
        {
            if($entityManager->find("Engine\Model\Inlog",$_POST['naam']) != null){
                $this->view = new NietNieuw();
                    header( "refresh:5;url=/registreer" );
            }
            elseif($_POST['pass1'] != $_POST['pass2']){
                $this->view = new Verschil();
                    header( "refresh:5;url=/registreer" );
            }
            else{
                $user = new Inlog();
                $user->setNaam($_POST['naam']);
                $user->setPass($_POST['pass1']);
                $user->setToegang(false);
                $user->setEmail($_POST['email']);
                $entityManager->persist($user);
                $entityManager->flush();
                $to = "test@gmail.com";
                $subject = "registratieverzoek";
                $headers = "From: server@$_SERVER[HTTP_HOST] \r\n";
                $headers .= "Reply-To: ". $_POST['email'] . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                include("resources/email/registratie.php");
                mail($to, $subject, $message, $headers);
                $this->view = new Geregistreerd();
            }
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
