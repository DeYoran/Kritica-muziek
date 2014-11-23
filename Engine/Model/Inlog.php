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
    protected $wachtwoord;
    
    /** @Column(type="string") **/
    protected $salt;

    public function __construct() {
        
    }
    
    public function getNaam(){
        return $this->naam;
    }
    
    public function setPass($pass){
        $this->salt = hash("crc32", time());
        $this->wachtwoord = hash("sha256",$pass.$this->salt);
    }
    
    public function checkPass($pass){
        return hash("sha256",$pass.$this->salt) === $this->wachtwoord;
    }

}