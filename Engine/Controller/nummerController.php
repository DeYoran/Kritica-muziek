<?php
namespace Engine\Controller;
use Engine\Controller\iController;
use Engine\View\View;

class nummerController extends listController
{
    public function __construct($entitymanager, $param)
    {
        if(!isset($_SESSION['kr-user']))
        {
            header("Location: ./login");
            die();
        }
        $array = $entitymanager->getRepository("Engine\Model\Liedje")->findAll();
        $colums = array("Naam", "Artiest(en)", "Album(s)", "Lokatie(s)", "Genre(s)");
        $rows = array();
        foreach ($array as $object){
            $row = array();
            $row[] = $object->getLiedNummer();
            $row[] = $object->getNaam();
            $row[] = $object->getAllAlbums()[0]->getAllArtiesten();
            $row[] = $object->getAllAlbums();
            $lokaties = array();
            foreach ($object->getAllAlbums() as $album){
                $lokaties[] = $album->getLokatie();
            }
            $row[] = $lokaties;
            $row[] = $object->getAllGenres();
            if(isset($param[0])){
                $albums = $object->getAllAlbums();
                $albumnrs = array();
                foreach($albums as $a){
                    $albumnrs[] = $a->getAlbumNummer();
                }
                if(in_array($param[0], $albumnrs)){
                    $rows[] = $row;
                }
            }
            else{
                $rows[] = $row;
            }
        }
        parent::__construct($colums, $rows, TRUE, "/liedje/");
    }
}
