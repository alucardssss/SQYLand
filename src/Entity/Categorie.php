<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="Categorie", uniqueConstraints={@ORM\UniqueConstraint(name="code", columns={"code"})})
 * @ORM\Entity
 */
class Categorie
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
     * @ORM\Column(name="code", type="string", length=20, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="famille", type="string", length=30, nullable=false)
     */
    private $famille;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=60, nullable=false)
     */
    private $nom;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Projet", mappedBy="categorie")
     */
    private $projets;

    public function __construct()
    {
        $this->projets = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getFamille(): ?string
    {
        return $this->famille;
    }

    public function setFamille(string $famille): self
    {
        $this->famille = $famille;

        return $this;
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

    /**
     * @return Collection|Projet[]
     */
    public function getProjets(): Collection
    {
        return $this->projetss;
    }

    public function addProjets(Projet $projets): self
    {
        if (!$this->projets->contains($projets)) {
            $this->projets[] = $projets;
            $projets->addCategory($this);
        }

        return $this;
    }

    public function removeProjets(Projet $projets): self
    {
        if ($this->projets->contains($projets)) {
            $this->projets->removeElement($projets);
            $projets->removeCategory($this);
        }

        return $this;
    }

}
