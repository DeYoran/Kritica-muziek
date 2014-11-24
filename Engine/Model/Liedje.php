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
     * @ManyToMany(targetEntity="Componist", inversedBy="liedjes")
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
    
}
