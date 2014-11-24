<?php
namespace Engine\Model;
 
/**
 * @Entity @Table(name="Artiest")
 **/
class Artiest
{
    /** @Id @Column(type="string") @GeneratedValue **/
    private $naam;
    /** @Column(type="string") **/
    private $omschrijving;
    /** @Column(type="date") **/
    private $begindatum;
    /** @Column(type="date") **/
    private $einddatum;
    /**
     * @ManyToMany(targetEntity="Album", mappedBy="artiesten")
     **/
    private $albums;
    
    /**
     * @ManyToMany(targetEntity="Genre", inversedBy="artiesten")
     * @JoinTable(
     *  name="artiestGenre",
     *  joinColumns={
     *   @JoinColumn(name="Artiest_naam", referencedColumnName="naam")
     *  },
     *  inverseJoinColumns={
     *   @JoinColumn(name="Genre_naam", referencedColumnName="naam")
     *  }
     * )
     **/
    private $genres;
    
    /**
     * @ManyToMany(targetEntity="Liedje", inversedBy="artiesten")
     * @JoinTable(
     *  name="LiedjeArtiest",
     *  joinColumns={
     *   @JoinColumn(name="artiest", referencedColumnName="naam")
     *  },
     *  inverseJoinColumns={
     *   @JoinColumn(name="liedNummer", referencedColumnName="liedNummer")
     *  }
     * )
     **/
    private $liedjes;
    
    public function __construct()
    {
        
    }
    
    function getNaam()
    {
        return $this->naam;
    }

    function getOmschrijving()
    {
        return $this->omschrijving;
    }

    function getBegindatum()
    {
        return $this->begindatum;
    }

    function getEinddatum()
    {
        return $this->einddatum;
    }

    function getAlbums()
    {
        return $this->albums->getValues();
    }

    function getGenres()
    {
        return $this->genres->getValues();
    }

    function setNaam($naam)
    {
        $this->naam = $naam;
    }

    function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;
    }

    function setBegindatum($begindatum)
    {
        $this->begindatum = $begindatum;
    }

    function setEinddatum($einddatum)
    {
        $this->einddatum = $einddatum;
    }

    function setAlbums($albums)
    {
        $this->albums = $albums;
    }
    
    function __toString(){
        return $this->naam;
    }
    
}
