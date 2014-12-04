<?php
namespace Engine\Model;
 
/**
 * @Entity @Table(name="Producer")
 **/
class Producer
{
    /** @Id @Column(type="string") **/
    private $producer;
    
    /**
     * @ManyToMany(targetEntity="Liedje", mappedBy="producers")
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
        return $this->producer;
    }

}
