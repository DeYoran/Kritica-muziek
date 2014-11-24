<?php
namespace Engine\Controller;
use Engine\Controller\iController;
use Engine\View\View;

class nummerController extends listController
{
    public function __construct($entitymanager)
    {
        $array = $entitymanager->getRepository("Engine\Model\Liedje")->findAll();
        $colums = array("Naam", "Verschenen", "Lokatie", "Artiest(en)", "Genre(s)", "Tracks");
        $rows = array();
        foreach ($array as $object){
            $row = array();
            $row[] = $object->getNaam();
            $row[] = $object->getVerschijningsdatumString();
            $row[] = $object->getLokatie();
            $row[] = $object->getArtiesten();
            $row[] = $object->getGenres();
            $row[] = $object->getAantalLiedjes();
            $rows[] = $row;
        }
        parent::__construct($colums, $rows);
    }
}
