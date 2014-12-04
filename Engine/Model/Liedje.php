<?php
namespace Engine\Model;

 use Doctrine\Common\Collections\ArrayCollection;
 
/**
 * @Entity @Table(name="liedje")
 **/
class Liedje
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $liedNummer;
    /** @Column(type="string") **/
    private $naam;
    /** @Column(type="string") **/
    private $pad;
    /**
     * @ManyToMany(targetEntity="Album", mappedBy="liedjes")
     **/
    private $albums;
        
    /**
     * @ManyToMany(targetEntity="Producer", inversedBy="liedjes")
     * @JoinTable(
     *  name="liedProducer",
     *  joinColumns={
     *   @JoinColumn(name="liedNummer", referencedColumnName="liedNummer")
     *  },
     *  inverseJoinColumns={
     *   @JoinColumn(name="producer", referencedColumnName="producer")
     *  }
     * )
     **/
     private $producers;
        
    /**
     * @ManyToMany(targetEntity="Componist", inversedBy="liedjes")
     * @JoinTable(
     *  name="liedComponist",
     *  joinColumns={
     *   @JoinColumn(name="liedNummer", referencedColumnName="liedNummer")
     *  },
     *  inverseJoinColumns={
     *   @JoinColumn(name="componist", referencedColumnName="componist")
     *  }
     * )
     **/
     private $componisten;
    /**
     * @ManyToMany(targetEntity="Artiest", mappedBy="liedjes")
     **/
     private $artiesten;
        
    /**
     * @ManyToMany(targetEntity="Genre", inversedBy="liedjes")
     * @JoinTable(
     *  name="liedjeGenre",
     *  joinColumns={
     *   @JoinColumn(name="liedNummer", referencedColumnName="liedNummer")
     *  },
     *  inverseJoinColumns={
     *   @JoinColumn(name="genre", referencedColumnName="naam")
     *  }
     * )
     **/
     private $genres;
    
    public function __construct()
    {
        
    }
    
    function getLiedNummer()
    {
        return $this->liedNummer;
    }

    function getNaam()
    {
        return $this->naam;
    }

    function getPad()
    {
        return $this->pad;
    }

    function getAllAlbums()
    {
        return $this->albums->getValues();
    }

    function getAllProducers()
    {
        return $this->producers->getValues();
    }

    function getAllComponisten()
    {
        return $this->componisten->getValues();
    }

    function getAllArtiesten()
    {
        return $this->artiesten->getValues();
    }

    function getAllGenres()
    {
        return $this->genres->getValues();
    }

    function setNaam($naam)
    {
        $this->naam = $naam;
    }

    function setPad($pad)
    {
        $this->pad = $pad;
    }

    function setAlbums($albums)
    {
        $this->albums = $albums;
    }

    function setProducers($producers)
    {
        $this->producers = $producers;
    }

    function setComponisten($componisten)
    {
        $this->componisten = $componisten;
    }

    function setArtiesten($artiesten)
    {
        $this->artiesten = $artiesten;
    }

    function setGenres($genres)
    {
        $this->genres = $genres;
    }

        
    public function __toString()
    {
        return $this->naam;
    }
    
}
