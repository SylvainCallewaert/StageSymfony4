<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection ;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SocieteRepository")
 */
class Societe
{

    /**
     * @ORM\OneToMany(targetEntity="Contact", mappedBy="societe")
     */
    private $contacts ;

    public function __construct ()
    {
        $this -> contacts = new ArrayCollection ();
    }

    public function getContacts ()
    {
        return $this -> contacts ;
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomSociete;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $siretSociete;

    public function getId()
    {
        return $this->id;
    }

    public function getNomSociete(): ?string
    {
        return $this->nomSociete;
    }

    public function setNomSociete(string $nomSociete): self
    {
        $this->nomSociete = $nomSociete;

        return $this;
    }

    public function getSiretSociete(): ?string
    {
        return $this->siretSociete;
    }

    public function setSiretSociete(string $siretSociete): self
    {
        $this->siretSociete = $siretSociete;

        return $this;
    }
}
