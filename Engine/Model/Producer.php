<?php
namespace Engine\Model;
 
/**
 * @Entity @Table(name="Producer")
 **/
class Producer
{
    private $producer;
    
    /**
     * @ManyToMany(targetEntity="Liedje", mappedBy="producers")
     **/
    private $liedjes;
    
    function __construct()
    {
        
    }

}
