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
        $this->genres = new ArrayCollection();
    }

    public function getGenres()
    {
        return $this->genres->getValues();
    }

    function getArtiesten()
    {
        return $this->artiesten->getValues();
    }
    
    public function getAlbumNummer(){
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
    
    function getVerschijningsdatumString()
    {
        return $this->verschijningsdatum->format('Y-m-d');
    }

    function getLokatie()
    {
        return $this->lokatie;
    }
    
    function getLiedjes()
    {
        return $this->liedjes->getValues();
    }
    
    function getAantalLiedjes()
    {
        return $this->liedjes->count();
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

}