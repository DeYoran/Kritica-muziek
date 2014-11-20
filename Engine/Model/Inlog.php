<?php
 namespace Engine\Model;

/**
 * @Entity @Table(name="inlog")
 **/
class Inlog
{
    /** @Id @Column(type="string") **/
    protected $naam;
	
    /** @Column(type="string") **/
    protected $pass;
    
    /** @Column(type="string") **/
    protected $salt;

    
    public function __construct() {
        
    }

}