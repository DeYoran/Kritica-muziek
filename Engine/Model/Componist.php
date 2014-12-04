<?php
namespace Engine\Model;
 
/**
 * @Entity @Table(name="componist")
 **/
class Componist
{
    /** @Id @Column(type="string") **/
    private $componist;
    
    /**
     * @ManyToMany(targetEntity="Liedje", mappedBy="componisten")
     **/
    private $liedjes;
    
    function __construct()
    {
        
    }

    public function getAllLiedjes()
    {
        return $this->liedjes_->getValues();
    }
    
    public function __toString()
    {
        return $this->componist;
    }
    
}
