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
        $this->albums = new ArrayCollection();
    }
    
    public function getAlbums()
    {
        return $this->albums->getValues();
    }
    
    function __toString(){
        return $this->naam;
    }
    
}
