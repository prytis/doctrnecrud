<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="tools")
 */
class Tool
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /** 
     * @ORM\Column(type="string") 
     */
    protected $name;


    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

}

/**
 * @ORM\Entity
 * @ORM\Table(name="persons")
 */
class Persons
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** 
     * @ORM\Column(type="string") 
     */
    protected $name;

    public function setPersonName($name)
    {
        $this->name = $name;
    }

    public function getPersonName()
    {
        return $this->name;
    }
    public function getPersonId()
    {
        return $this->id;
    }
    
}
/**
 * @ORM\Entity
 * @ORM\Table(name="couple")
 */
class Couple
{
    /** @ORM\Id 
     * @ORM\ManyToOne(targetEntity="Tool",inversedBy="Couple",cascade={"ALL"}) 
     * */
    private $tool;

    /** 
     * @ORM\Id 
     * @ORM\ManyToOne(targetEntity="Persons",inversedBy="Couple",cascade={"ALL"}) 
     * */
    private $person;

    public function __construct(Tool $tool,Persons $person)
    {
        $this->tool = $tool;
        $this->person = $person;
    }
    public function getPerson()
    {
        return $this->person;
    }
    public function getTool()
    {
        return $this->tool;
    }
    
    
}
