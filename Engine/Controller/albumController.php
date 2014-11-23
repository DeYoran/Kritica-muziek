<?php
namespace Engine\Controller;
use Engine\Controller\iController;
use Engine\View\View;

class albumController extends listController
{
    public function __construct($entitymanager)
    {
        $array = $entitymanager->getRepository("Engine\Model\Album")->findAll();
        $colums = array("Naam", "Verschenen", "Lokatie");
        $rows = array();
        foreach ($array as $object){
            $row = array();
            $row[] = $object->getNaam();
            $row[] = $object->getVerschijningsdatumString();
            $row[] = $object->getLokatie();
            $rows[] = $row;
        }
        parent::__construct($colums, $rows);
    }
}