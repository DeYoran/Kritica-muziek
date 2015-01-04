<?php
namespace Engine\Controller;
use Engine\Controller\iController;
use Engine\View\View;

class nummerController extends listController
{
    public function __construct($entitymanager)
    {
        if(!isset($_SESSION['kr-user']))
        {
            header("Location: ./login");
            die();
        }
        $array = $entitymanager->getRepository("Engine\Model\Liedje")->findAll();
        $colums = array("Naam", "Album(s)", "Lokatie(s)", "Genre(s)");
        $rows = array();
        foreach ($array as $object){
            $row = array();
            $row[] = $object->getLiedNummer();
            $row[] = $object->getNaam();
            $row[] = $object->getAllAlbums();
            $lokaties = array();
            foreach ($object->getAllAlbums() as $album){
                $lokaties[] = $album->getLokatie();
            }
            $row[] = $lokaties;
            $row[] = $object->getAllGenres();
            $rows[] = $row;
        }
        parent::__construct($colums, $rows, TRUE, "/liedje/");
    }
}
