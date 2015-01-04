<?php
namespace Engine\Controller;
use Engine\Controller\iController;
use Engine\View\View;

class genreController extends listController
{
    public function __construct($entitymanager)
    {
        if(!isset($_SESSION['kr-user']))
        {
            header("Location: ./login");
            die();
        }
         $array = $entitymanager->getRepository("Engine\Model\Genre")->findAll();
        $colums = array("Naam","Omschrijving","Albums");
        $rows = array();
        foreach ($array as $object){
            $row = array();
            $row[] = $object->getNaam();
            $row[] = $object->getNaam();
            $row[] = $object->getOmschrijving();
            $row[] = $object->getAlbums()->count();
            $rows[] = $row;
        }
        parent::__construct($colums, $rows);
    }
}
