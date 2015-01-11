<?php
namespace Engine\Controller;
use Engine\Controller\iController;
use Engine\View\View;

class connectController extends listController
{
    public function __construct($entitymanager, $param)
    {
        if(!isset($_SESSION['kr-user']))
        {
            header("Location: ./login");
            die();
        }
        $array = $entitymanager->getRepository("Engine\Model\Liedje")->findAll();
        $colums = array("Naam");
        $rows = array();
        $FURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        foreach ($array as $key => $object){
            if($this->checkLokatie($object, $param[0]) && 
                    isset($param[1]) &&
                    $object->getPad() !== ''){
                $urlDelen  = explode("_", $param[1]);
                $padDelen  = explode("\\", $object->getPad());
                while(isset($urlDelen[0])){
                    if($urlDelen[0] == $padDelen[0]){
                        array_shift($urlDelen);
                        array_shift($padDelen);
                    }
                    else{
                        unset($array[$key]);
                        break 2;
                    }
                }
                if(count($padDelen)==1){
                    $row = array('',"<a href='/liedje/".
                            $object->getLiedNummer().
                            "'>".
                            $object->getNaam());
                    if(!in_array($row, $rows)){
                        $rows[] = $row;
                    }
                }
                else{
                   $row = array('',"<b><a href='$FURL"."_"."$padDelen[0]'>$padDelen[0]</a></b>");
                   if(!in_array($row, $rows)){
                        $rows[] = $row;
                    }
                }
            }
            /*
            $row = array();
            $row[] = $object->getLiedNummer();
            $row[] = $object->getNaam();
            $row[] = $object->getAllAlbums()[0]->getAllArtiesten();
            $row[] = $object->getAllAlbums();
            $lokaties = array();
            foreach ($object->getAllAlbums() as $album){
                $lokaties[] = $album->getLokatie();
            }
            $row[] = $object->getAllGenres();
            if(in_array($param[0], $lokaties) && $object->getPad() != null && isset($param[1])){
                $param[1] = str_replace("_", "\\", $param[1]);
                if($this->startsWith($object->getPad(), $param[1])){
                    $row[] = $object->getPad();
                    $rows[] = $row;
                }
            }
            */
        }
        parent::__construct($colums, $rows);
    }
    
    function startsWith($haystack, $needle) {
        // search backwards starting from haystack length characters from the end
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
    }
    
    function checkLokatie($liedje, $lokatie){
        $albums = $liedje->getAllAlbums();
        foreach ($albums as $album){
            if($lokatie == $album->getLokatie()){
                return true;
            }
        }
        return false;
    }
    
}
