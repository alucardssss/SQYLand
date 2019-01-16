<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sudo
 *
 * @ORM\Table(name="sudo")
 * @ORM\Entity
 */
class Sudo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=40, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=64, nullable=false)
     */
    private $mdp;

    /**
     * @ORM\Column(type="array")
     */
    private $roles = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }


    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

}
