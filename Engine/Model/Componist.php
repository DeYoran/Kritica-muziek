<?php
namespace Engine\Model;
 
/**
 * @Entity @Table(name="componist")
 **/
class Componist
{
    private $componist;
    
    /**
     * @ManyToMany(targetEntity="Liedje", mappedBy="componisten")
     **/
    private $liedjes;
    
    function __construct()
    {
        
    }

    
}
