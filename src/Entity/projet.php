<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjetRepository")
 */
class projet
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
     * @ORM\Column(type="boolean")
     */
    private $valider;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $image_logo1;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $image_logo2;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $image_logo3;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $image1;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $image2;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $image3;

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
     * @ORM\Column(type="string", length=90, nullable=true)
     */
    private $iframe_son1;

    /**
     * @ORM\Column(type="string", length=90, nullable=true)
     */
    private $iframe_son2;

    /**
     * @ORM\Column(type="string", length=90, nullable=true)
     */
    private $iframe_son3;

    /**
     * @ORM\Column(type="string", length=90, nullable=true)
     */
    private $iframe_video1;

    /**
     * @ORM\Column(type="string", length=90, nullable=true)
     */
    private $iframe_video2;

    /**
     * @ORM\Column(type="string", length=90, nullable=true)
     */
    private $iframe_video3;

    /**
     * @ORM\ManyToOne(targetEntity="artiste", inversedBy="projet_id")
     */
    private $artiste;

    /**
     * @ORM\OneToMany(targetEntity="artiste", mappedBy="projet")
     */
    private $artiste_id;

    /**
     * @ORM\OneToMany(targetEntity="categorie", mappedBy="projet")
     */
    private $categorie_id;

    /**
     * @ORM\OneToMany(targetEntity="groupe", mappedBy="projet")
     */
    private $groupe_id;

    public function __construct()
    {
        $this->artiste_id = new ArrayCollection();
        $this->categorie_id = new ArrayCollection();
        $this->groupe_id = new ArrayCollection();
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

    public function getValider(): ?bool
    {
        return $this->valider;
    }

    public function setValider(bool $valider): self
    {
        $this->valider = $valider;

        return $this;
    }

    public function getImageLogo1(): ?string
    {
        return $this->image_logo1;
    }

    public function setImageLogo1(?string $image_logo1): self
    {
        $this->image_logo1 = $image_logo1;

        return $this;
    }

    public function getImageLogo2(): ?string
    {
        return $this->image_logo2;
    }

    public function setImageLogo2(?string $image_logo2): self
    {
        $this->image_logo2 = $image_logo2;

        return $this;
    }

    public function getImageLogo3(): ?string
    {
        return $this->image_logo3;
    }

    public function setImageLogo3(?string $image_logo3): self
    {
        $this->image_logo3 = $image_logo3;

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(?string $image1): self
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): self
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): self
    {
        $this->image3 = $image3;

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

    public function getIframeSon1(): ?string
    {
        return $this->iframe_son1;
    }

    public function setIframeSon1(?string $iframe_son1): self
    {
        $this->iframe_son1 = $iframe_son1;

        return $this;
    }

    public function getIframeSon2(): ?string
    {
        return $this->iframe_son2;
    }

    public function setIframeSon2(?string $iframe_son2): self
    {
        $this->iframe_son2 = $iframe_son2;

        return $this;
    }

    public function getIframeSon3(): ?string
    {
        return $this->iframe_son3;
    }

    public function setIframeSon3(?string $iframe_son3): self
    {
        $this->iframe_son3 = $iframe_son3;

        return $this;
    }

    public function getIframeVideo1(): ?string
    {
        return $this->iframe_video1;
    }

    public function setIframeVideo1(?string $iframe_video1): self
    {
        $this->iframe_video1 = $iframe_video1;

        return $this;
    }

    public function getIframeVideo2(): ?string
    {
        return $this->iframe_video2;
    }

    public function setIframeVideo2(?string $iframe_video2): self
    {
        $this->iframe_video2 = $iframe_video2;

        return $this;
    }

    public function getIframeVideo3(): ?string
    {
        return $this->iframe_video3;
    }

    public function setIframeVideo3(?string $iframe_video3): self
    {
        $this->iframe_video3 = $iframe_video3;

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
     * @return Collection|artiste[]
     */
    public function getArtisteId(): Collection
    {
        return $this->artiste_id;
    }

    public function addArtisteId(artiste $artisteId): self
    {
        if (!$this->artiste_id->contains($artisteId)) {
            $this->artiste_id[] = $artisteId;
            $artisteId->setProjet($this);
        }

        return $this;
    }

    public function removeArtisteId(artiste $artisteId): self
    {
        if ($this->artiste_id->contains($artisteId)) {
            $this->artiste_id->removeElement($artisteId);
            // set the owning side to null (unless already changed)
            if ($artisteId->getProjet() === $this) {
                $artisteId->setProjet(null);
            }
        }

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
            $categorieId->setProjet($this);
        }

        return $this;
    }

    public function removeCategorieId(categorie $categorieId): self
    {
        if ($this->categorie_id->contains($categorieId)) {
            $this->categorie_id->removeElement($categorieId);
            // set the owning side to null (unless already changed)
            if ($categorieId->getProjet() === $this) {
                $categorieId->setProjet(null);
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
            $groupeId->setProjet($this);
        }

        return $this;
    }

    public function removeGroupeId(groupe $groupeId): self
    {
        if ($this->groupe_id->contains($groupeId)) {
            $this->groupe_id->removeElement($groupeId);
            // set the owning side to null (unless already changed)
            if ($groupeId->getProjet() === $this) {
                $groupeId->setProjet(null);
            }
        }

        return $this;
    }
}
