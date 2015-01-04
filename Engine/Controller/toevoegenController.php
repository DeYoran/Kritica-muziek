<?php
namespace Engine\Controller;
use Engine\Controller\iController;
use Engine\View\View;
use Engine\View\AlbumToevoegen;
use Engine\View\NummersToevoegen;
use Engine\View\ArtiestToevoegen;
use Engine\View\GenreToevoegen;
use Engine\Model\Album;
use Doctrine\Common\Collections\ArrayCollection;
use Engine\Model\Liedje;
use Engine\Model\Artiest;
use Engine\Model\Genre;
use Engine\View\LiedjesToegevoegd;
use Engine\View\ArtiestToegevoegd;
use Engine\View\GenreToegevoegd;

class toevoegenController implements iController
{
    private $view;
    
    public function __construct($entitymanager, $params)
    {
        $add = $params[0];
        switch($add){
            case "submit" : {
                if($params[1] == 'album'){
                    $this->submitAlbum($entitymanager);
                }
                elseif($params[1] == 'artiest'){
                    $this->submitArtiest($entitymanager);
                }
                elseif ($params[1] == 'liedjes'){
                   $this->submitLiedjes($entitymanager);
                }
                elseif ($params[1] == 'genre'){
                   $this->submitGenre($entitymanager);
                }
                else{
                    //DO NOTHING
                }
                break;
            }
            case "album" : {
                $this->album($entitymanager);
                break;
            }
            case "artiest" : {
                $this->artiest($entitymanager);
                break;
            }
            case "genre" : {
                $this->genre();
                break;
            }
            case "nummer" : {
                break;
            }
            default : {
                $this->view = null;
            }
        }
    }
    
    private function submitLiedjes($entitymanager){
        $liedjes = array();
        $album = new Album();
        $nr = $_POST['albumnummer'];
        foreach ($_POST['lied'] as $lied){
            $liedje = new Liedje();
            $liedje->setNaam($lied['naam']);
            $liedje->setPad($lied['pad']);

            $aa = new ArrayCollection();
            foreach ($lied['artiesten'] as $artiest){
                $dbartiest = $entitymanager->find("Engine\Model\Artiest", $artiest);
                $aa->add($dbartiest);
            }
            $liedje->setArtiesten($aa);

            $ag = new ArrayCollection();
            foreach ($lied['genres'] as $genre){
                $dbgenre = $entitymanager->find("Engine\Model\Genre", $genre);
                $ag->add($dbgenre);
            }
            $liedje->setGenres($ag);

            $album = $entitymanager->find("Engine\Model\Album", $nr);
            $albumliedjes = $album->getLiedjes();
            $albumliedjes->add($liedje);
            $album->setLiedjes($albumliedjes);

            $liedjes[] = $liedje;
        }
        foreach ($liedjes as $liedje){
            $entitymanager->persist($liedje);
        }
        $entitymanager->flush();
        $this->view = new LiedjesToegevoegd();
        header( "refresh:5;url=/home" );
    }
    
    private function submitAlbum($entitymanager){
        $album = new Album();
        $album->setNaam($_POST['naam']);
        $album->setVerschijningsdatum(new \DateTime($_POST['date']));
        $album->setLokatie($_POST['locatie']);

        $aa = new ArrayCollection();
        $dbartiest = $entitymanager->find("Engine\Model\Artiest", $_POST['artiest']);
        $aa->add($dbartiest);
        $album->setArtiesten($aa);

        $ag = new ArrayCollection();
        foreach ($_POST['genre'] as $genre){
            $dbgenre = $entitymanager->find("Engine\Model\Genre", $genre);
            $ag->add($dbgenre);
        }
        $album->setGenres($ag);

        $entitymanager->persist($album);
        $entitymanager->flush();
        $nummer = $album->getAlbumNummer();
        $artiesten = $entitymanager->getRepository("Engine\Model\Artiest")->findAll();
        foreach ($artiesten as $artiest){
            $artiest = $artiest->getNaam();
        }
        $allegenres = $entitymanager->getRepository("Engine\Model\Genre")->findAll();
        foreach ($allegenres as $genre){
            $genre = $genre->getNaam();
        }
        $this->view = new NummersToevoegen($_POST['liedjes'], 
                $_POST['genre'], 
                $_POST['naam'],  
                $_POST['artiest'], 
                $artiesten,
                $allegenres, 
                $nummer);
    }
    
    private function submitArtiest($entitymanager){
        $artiest = new Artiest();
        $artiest->setNaam($_POST['naam']);
        $artiest->setOmschrijving($_POST['omschrijving']);
        if($_POST['start'] != null){
            $artiest->setBegindatum($_POST['start']);
        }
        if($_POST['end'] != null){
            $artiest->setEinddatum($_POST['end']);
        }
        $entitymanager->persist($artiest);
        $entitymanager->flush();
        $this->view = new ArtiestToegevoegd();
        header( "refresh:5;url=/home" );
    }
        
    private function submitGenre($entitymanager){
        $genre = new Genre();
        $genre->setNaam($_POST['naam']);
        $genre->setOmschrijving($_POST['omschrijving']);
        $entitymanager->persist($genre);
        $entitymanager->flush();
        $this->view = new GenreToegevoegd();
        header( "refresh:5;url=/home" );
    }
    
    private function liedjes($entitymanager, $album = null){
        
    }
    
    private function album($entitymanager){
        $genres = $entitymanager->getRepository("Engine\Model\Genre")->findAll();
        $artiesten = $entitymanager->getRepository("Engine\Model\Artiest")->findAll();
        $genrelist = array();
        foreach ($genres as $genre){
            $genrelist[] = $genre->getNaam();
        }
        $artiestlijst = array();
        foreach ($artiesten as $artiest){
            $artiestlijst[] = $artiest->getNaam();
        }
        $this->view = new AlbumToevoegen($genrelist, $artiestlijst);
    } 

    private function artiest($entitymanager){
        $genres = $entitymanager->getRepository("Engine\Model\Genre")->findAll();
        $artiesten = $entitymanager->getRepository("Engine\Model\Artiest")->findAll();
        $genrelist = array();
        foreach ($genres as $genre){
            $genrelist[] = $genre->getNaam();
        }
        $artiestlijst = array();
        foreach ($artiesten as $artiest){
            $artiestlijst[] = $artiest->getNaam();
        }
        $this->view = new ArtiestToevoegen($genre, $artiesten);
    }
    
    private function genre()
    {
        $this->view = new GenreToevoegen();
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