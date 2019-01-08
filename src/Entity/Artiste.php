<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtisteRepository")
 */
class Artiste
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $mdp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $resume;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_inscription;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_connexion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\categorie", mappedBy="artiste")
     */
    private $categorie_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\groupe", mappedBy="artiste")
     */
    private $groupe_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\projet", mappedBy="artiste")
     */
    private $projet_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Projet", inversedBy="artiste_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projet;

    public function __construct()
    {
        $this->categorie_id = new ArrayCollection();
        $this->groupe_id = new ArrayCollection();
        $this->projet_id = new ArrayCollection();
    }

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    public function setDateInscription(\DateTimeInterface $date_inscription): self
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    public function getDateConnexion(): ?\DateTimeInterface
    {
        return $this->date_connexion;
    }

    public function setDateConnexion(\DateTimeInterface $date_connexion): self
    {
        $this->date_connexion = $date_connexion;

        return $this;
    }

    /**
     * @return Collection|categorie[]
     */
    public function getCategorieId(): Collection
    {
        return $this->categorie_id;
    }

    public function addCategorieId(categorie $categorieId): self
    {
        if (!$this->categorie_id->contains($categorieId)) {
            $this->categorie_id[] = $categorieId;
            $categorieId->setArtiste($this);
        }

        return $this;
    }

    public function removeCategorieId(categorie $categorieId): self
    {
        if ($this->categorie_id->contains($categorieId)) {
            $this->categorie_id->removeElement($categorieId);
            // set the owning side to null (unless already changed)
            if ($categorieId->getArtiste() === $this) {
                $categorieId->setArtiste(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|groupe[]
     */
    public function getGroupeId(): Collection
    {
        return $this->groupe_id;
    }

    public function addGroupeId(groupe $groupeId): self
    {
        if (!$this->groupe_id->contains($groupeId)) {
            $this->groupe_id[] = $groupeId;
            $groupeId->setArtiste($this);
        }

        return $this;
    }

    public function removeGroupeId(groupe $groupeId): self
    {
        if ($this->groupe_id->contains($groupeId)) {
            $this->groupe_id->removeElement($groupeId);
            // set the owning side to null (unless already changed)
            if ($groupeId->getArtiste() === $this) {
                $groupeId->setArtiste(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|projet[]
     */
    public function getProjetId(): Collection
    {
        return $this->projet_id;
    }

    public function addProjetId(projet $projetId): self
    {
        if (!$this->projet_id->contains($projetId)) {
            $this->projet_id[] = $projetId;
            $projetId->setArtiste($this);
        }

        return $this;
    }

    public function removeProjetId(projet $projetId): self
    {
        if ($this->projet_id->contains($projetId)) {
            $this->projet_id->removeElement($projetId);
            // set the owning side to null (unless already changed)
            if ($projetId->getArtiste() === $this) {
                $projetId->setArtiste(null);
            }
        }

        return $this;
    }

    public function getProjet(): ?Projet
    {
        return $this->projet;
    }

    public function setProjet(?Projet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }
}
