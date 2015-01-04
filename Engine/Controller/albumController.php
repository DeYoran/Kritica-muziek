<?php
namespace Engine\Controller;
use Engine\Controller\iController;
use Engine\View\View;

class albumController extends listController
{
    public function __construct($entitymanager, $params)
    {
        if(!isset($_SESSION['kr-user']))
        {
            header("Location: ./login");
            die();
        }
        $array = $entitymanager->getRepository("Engine\Model\Album")->findAll();
        $colums = array("Naam", "Verschenen", "Lokatie", "Artiest(en)", "Genre(s)", "Tracks");
        $rows = array();
        foreach ($array as $object){
            $row = array();
            $row[] = $object->getAlbumNummer();
            $row[] = $object->getNaam();
            $row[] = $object->getVerschijningsdatum()->format('Y');
            $row[] = $object->getLokatie();
            $row[] = $object->getAllArtiesten();
            $row[] = $object->getAllGenres();
            $row[] = $object->getLiedjes()->count();
            $rows[] = $row;
        }
        parent::__construct($colums, $rows);
    }
}