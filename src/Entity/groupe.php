<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GroupeRepository")
 */
class groupe
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
     * @ORM\Column(type="text")
     */
    private $resume;

    /**
     * @ORM\Column(type="string", length=90)
     */
    private $image_profil;

    /**
     * @ORM\Column(type="string", length=90, nullable=true)
     */
    private $lien_facebook;

    /**
     * @ORM\Column(type="string", length=90, nullable=true)
     */
    private $lien_twitter;

    /**
     * @ORM\Column(type="string", length=90, nullable=true)
     */
    private $lien_youtube;

    /**
     * @ORM\Column(type="string", length=90, nullable=true)
     */
    private $lien_soundcloud;

    /**
     * @ORM\Column(type="string", length=90, nullable=true)
     */
    private $lien_linkedin;

    /**
     * @ORM\Column(type="string", length=90, nullable=true)
     */
    private $lien_perso;

    /**
     * @ORM\ManyToOne(targetEntity="artiste", inversedBy="groupe_id")
     */
    private $artiste;

    /**
     * @ORM\OneToMany(targetEntity="categorie", mappedBy="groupe")
     */
    private $categorie_id;

    /**
     * @ORM\ManyToOne(targetEntity="projet", inversedBy="groupe_id")
     */
    private $projet;

    public function __construct()
    {
        $this->categorie_id = new ArrayCollection();
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

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getImageProfil(): ?string
    {
        return $this->image_profil;
    }

    public function setImageProfil(string $image_profil): self
    {
        $this->image_profil = $image_profil;

        return $this;
    }

    public function getLienFacebook(): ?string
    {
        return $this->lien_facebook;
    }

    public function setLienFacebook(?string $lien_facebook): self
    {
        $this->lien_facebook = $lien_facebook;

        return $this;
    }

    public function getLienTwitter(): ?string
    {
        return $this->lien_twitter;
    }

    public function setLienTwitter(?string $lien_twitter): self
    {
        $this->lien_twitter = $lien_twitter;

        return $this;
    }

    public function getLienYoutube(): ?string
    {
        return $this->lien_youtube;
    }

    public function setLienYoutube(?string $lien_youtube): self
    {
        $this->lien_youtube = $lien_youtube;

        return $this;
    }

    public function getLienSoundcloud(): ?string
    {
        return $this->lien_soundcloud;
    }

    public function setLienSoundcloud(?string $lien_soundcloud): self
    {
        $this->lien_soundcloud = $lien_soundcloud;

        return $this;
    }

    public function getLienLinkedin(): ?string
    {
        return $this->lien_linkedin;
    }

    public function setLienLinkedin(?string $lien_linkedin): self
    {
        $this->lien_linkedin = $lien_linkedin;

        return $this;
    }

    public function getLienPerso(): ?string
    {
        return $this->lien_perso;
    }

    public function setLienPerso(?string $lien_perso): self
    {
        $this->lien_perso = $lien_perso;

        return $this;
    }

    public function getArtiste(): ?artiste
    {
        return $this->artiste;
    }

    public function setArtiste(?artiste $artiste): self
    {
        $this->artiste = $artiste;

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
            $categorieId->setGroupe($this);
        }

        return $this;
    }

    public function removeCategorieId(categorie $categorieId): self
    {
        if ($this->categorie_id->contains($categorieId)) {
            $this->categorie_id->removeElement($categorieId);
            // set the owning side to null (unless already changed)
            if ($categorieId->getGroupe() === $this) {
                $categorieId->setGroupe(null);
            }
        }

        return $this;
    }

    public function getProjet(): ?projet
    {
        return $this->projet;
    }

    public function setProjet(?projet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }
}
