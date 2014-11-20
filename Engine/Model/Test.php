<?php
namespace Engine\Model;
/**
 * @Entity @Table(name="Rol")
 **/

class Test
{
     /** @Id @Column(type="integer") @GeneratedValue **/
    protected $klantnr;
	
    /** @Column(type="string") **/
    protected $naam;
    
    
    /**
     * @ManyToOne(targetEntity="club", inversedBy="leden")
     * @JoinColumn(name="club", referencedColumnName="clubnaam")
     */
    protected  $club;

    public function getKlantnr()
    {
        return $this->klantnr;
    }

    public function getNaam()
    {
        return $this->naam;
    }

    public function setNaam($naam)
    {
        $this->naam = $naam;
    }
    
    public function getClub()
    {
        return $this->club;
    }
    
    public function setClub($club)
    {
        $this->club = $club;
        $this->club->addLid($this);
    }
}