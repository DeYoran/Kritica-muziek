<?php
 namespace Engine\Model;
 
 use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="album")
 **/
class Album
{
     /** @Id @Column(type="integer") @GeneratedValue **/
    private $albumNummer;
    /** @Column(type="string") **/
    private $naam;
    /** @Column(type="date") **/
    private $verschijningsdatum;
    /** @Column(type="string") **/
    private $lokatie; 
    /**
     * @ManyToMany(targetEntity="Genre", inversedBy="albums")
     * @JoinTable(
     *  name="albumGenre",
     *  joinColumns={
     *   @JoinColumn(name="album", referencedColumnName="albumNummer")
     *  },
     *  inverseJoinColumns={
     *   @JoinColumn(name="genre", referencedColumnName="naam")
     *  }
     * )
     **/
    private $genres;
    
    /**
     * @ManyToMany(targetEntity="Liedje", inversedBy="albums")
     * @JoinTable(
     *  name="albumLiedjes",
     *  joinColumns={
     *   @JoinColumn(name="albumNummer", referencedColumnName="albumNummer")
     *  },
     *  inverseJoinColumns={
     *   @JoinColumn(name="liedNummer", referencedColumnName="liedNummer")
     *  }
     * )
     **/
    private $liedjes;
    
    /**
     * @ManyToMany(targetEntity="Artiest", inversedBy="albums")
     * @JoinTable(
     *  name="albumArtiest",
     *  joinColumns={
     *   @JoinColumn(name="albumNummer", referencedColumnName="albumNummer")
     *  },
     *  inverseJoinColumns={
     *   @JoinColumn(name="naam", referencedColumnName="naam")
     *  }
     * )
     **/
    private $artiesten;
    
    public function __construct()
    {
        
    }
    
    function getAlbumNummer()
    {
        return $this->albumNummer;
    }

    function getNaam()
    {
        return $this->naam;
    }

    function getVerschijningsdatum()
    {
        return $this->verschijningsdatum;
    }

    function getLokatie()
    {
        return $this->lokatie;
    }

    function getGenres()
    {
        return $this->genres;
    }

    function getLiedjes()
    {
        return $this->liedjes;
    }

    function getArtiesten()
    {
        return $this->artiesten;
    }

    function getAllGenres()
    {
        return $this->genres->getValues();
    }

    function getAllLiedjes()
    {
        return $this->liedjes->getValues();
    }

    function getAllArtiesten()
    {
        return $this->artiesten->getValues();
    }

    function setNaam($naam)
    {
        $this->naam = $naam;
    }

    function setVerschijningsdatum($verschijningsdatum)
    {
        $this->verschijningsdatum = $verschijningsdatum;
    }

    function setLokatie($lokatie)
    {
        $this->lokatie = $lokatie;
    }
    
    function setGenres($genres){
        $this->genres = $genres;
    }
    
    function setArtiesten($artiesten){
        $this->artiesten = $artiesten;
    }
    
    function setLiedjes($liedjes){
        $this->liedjes = $liedjes;
    }
                function __toString()
    {
        return $this->naam;
    }
}