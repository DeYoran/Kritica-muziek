<?php
namespace Engine\Controller;
use Engine\Controller\iController;
use Engine\View\View;

class artiestController extends listController
{
    public function __construct($entitymanager, $param)
    {
        if(!isset($_SESSION['kr-user']))
        {
            header("Location: ./login");
            die();
        }
        $array = $entitymanager->getRepository("Engine\Model\Artiest")->findAll();
        $colums = array("Naam", "Begonnen", "Gestopt", "Albums", "Liedjes");
        $rows = array();
        foreach ($array as $object){
            $row = array();
            $row[] = $object->getNaam();
            $row[] = $object->getNaam();
            if($object->getBegindatum() != null){
                $row[] = $object->getBegindatum()->format('Y');
            }
            else{
                $row[] = "onbekend";
            }
            if($object->getEinddatum() != null){
                $row[] = $object->getEinddatum()->format('Y');
            }
            else{
                $row[] = "nee";
            }
            $row[] = $object->getAllAlbums()->count();
            $liedjes = 0;
            foreach ($object->getAllAlbums() as $album){
                if($album->getAllLiedjes() != null){
                    $liedjes += $album->getLiedjes()->count();
                }
            }
            $row[] = $liedjes;
            if(isset($param[0])){
                $genres = $object->getAllGenres();
                $genreNamen = array();
                foreach($genres as $g){
                    $genreNamen[] = $g->getNaam();
                }
                if(in_array($param[0], $genreNamen)){
                    $rows[] = $row;
                }
            }
            else{
                $rows[] = $row;
            }
        }
        parent::__construct($colums, $rows, TRUE, '/album/');
    }
}