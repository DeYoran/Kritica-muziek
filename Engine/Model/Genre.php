<?php
namespace Engine\Model;

 use Doctrine\Common\Collections\ArrayCollection;
 
/**
 * @Entity @Table(name="genre")
 **/

class Genre
{
    /** @Id @Column(type="string") **/
    private $naam;
    /** @Column(type="string") **/
    private $omschrijving;
    /**
     * @ManyToMany(targetEntity="Album", mappedBy="genres")
     **/
    private $albums;
    /**
     * @ManyToMany(targetEntity="Liedje", mappedBy="genres")
     **/
    private $liedjes;
    /**
     * @ManyToMany(targetEntity="Artiest", mappedBy="genres")
     **/
    private $artiesten;
    
    public function __construct()
    {
        ;
    }
    
    function getNaam()
    {
        return $this->naam;
    }

    function getOmschrijving()
    {
        return $this->omschrijving;
    }

    function getAllAlbums()
    {
        return $this->albums->getValues();
    }

    function getAlbums()
    {
        return $this->albums;
    }

    function getLiedjes()
    {
        return $this->liedjes;
    }

    function getAllLiedjes()
    {
        return $this->liedjes->getValues();
    }

    function getAllArtiesten()
    {
        return $this->artiesten->getValues();
    }

    function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;
    }
        
    function __toString(){
        return $this->naam;
    }
    
}
