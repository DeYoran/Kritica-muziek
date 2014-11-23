<?php
namespace Engine\Model;

 use Doctrine\Common\Collections\ArrayCollection;
 
/**
 * @Entity @Table(name="genre")
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
    
    
    public function __construct()
    {
        
    }
    
}
