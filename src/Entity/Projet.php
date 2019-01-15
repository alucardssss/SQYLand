<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="projet", indexes={@ORM\Index(name="categorie_id", columns={"categorie_id"})})
 * @ORM\Entity
 */
class Projet
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
     * @ORM\Column(name="nom", type="string", length=60, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="text", length=0, nullable=false)
     */
    private $resume;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image_profil", type="string", length=60, nullable=true)
     */
    private $imageProfil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image_logo1", type="string", length=60, nullable=true)
     */
    private $imageLogo1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image_logo2", type="string", length=60, nullable=true)
     */
    private $imageLogo2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image_logo3", type="string", length=60, nullable=true)
     */
    private $imageLogo3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image1", type="string", length=60, nullable=true)
     */
    private $image1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image2", type="string", length=60, nullable=true)
     */
    private $image2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image3", type="string", length=60, nullable=true)
     */
    private $image3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lien_facebook", type="string", length=90, nullable=true)
     */
    private $lienFacebook;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lien_twitter", type="string", length=90, nullable=true)
     */
    private $lienTwitter;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lien_youtube", type="string", length=90, nullable=true)
     */
    private $lienYoutube;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lien_soundcloud", type="string", length=90, nullable=true)
     */
    private $lienSoundcloud;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lien_linkedin", type="string", length=90, nullable=true)
     */
    private $lienLinkedin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lien_perso", type="string", length=90, nullable=true)
     */
    private $lienPerso;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iframe_son1", type="string", length=120, nullable=true)
     */
    private $iframeSon1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iframe_son2", type="string", length=120, nullable=true)
     */
    private $iframeSon2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iframe_son3", type="string", length=120, nullable=true)
     */
    private $iframeSon3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iframe_video1", type="string", length=120, nullable=true)
     */
    private $iframeVideo1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iframe_video2", type="string", length=120, nullable=true)
     */
    private $iframeVideo2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iframe_video3", type="string", length=120, nullable=true)
     */
    private $iframeVideo3;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Categorie",
     *     cascade={"persist"},
     *     inversedBy="artistes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     * })
     */
    private $categorie;

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

    public function getImageProfil()
    {
        return $this->imageProfil;
    }

    public function setImageProfil( $imageProfil): self
    {
        $this->imageProfil = $imageProfil;

        return $this;
    }

    public function getImageLogo1()
    {
        return $this->imageLogo1;
    }

    public function setImageLogo1( $imageLogo1)
    {
        $this->imageLogo1 = $imageLogo1;

        return $this;
    }

    public function getImageLogo2()
    {
        return $this->imageLogo2;
    }

    public function setImageLogo2( $imageLogo2)
    {
        $this->imageLogo2 = $imageLogo2;

        return $this;
    }

    public function getImageLogo3()
    {
        return $this->imageLogo3;
    }

    public function setImageLogo3( $imageLogo3)
    {
        $this->imageLogo3 = $imageLogo3;

        return $this;
    }

    public function getImage1()
    {
        return $this->image1;
    }

    public function setImage1( $image1)
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2()
    {
        return $this->image2;
    }

    public function setImage2( $image2)
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3()
    {
        return $this->image3;
    }

    public function setImage3( $image3)
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getLienFacebook(): ?string
    {
        return $this->lienFacebook;
    }

    public function setLienFacebook(?string $lienFacebook): self
    {
        $this->lienFacebook = $lienFacebook;

        return $this;
    }

    public function getLienTwitter(): ?string
    {
        return $this->lienTwitter;
    }

    public function setLienTwitter(?string $lienTwitter): self
    {
        $this->lienTwitter = $lienTwitter;

        return $this;
    }

    public function getLienYoutube(): ?string
    {
        return $this->lienYoutube;
    }

    public function setLienYoutube(?string $lienYoutube): self
    {
        $this->lienYoutube = $lienYoutube;

        return $this;
    }

    public function getLienSoundcloud(): ?string
    {
        return $this->lienSoundcloud;
    }

    public function setLienSoundcloud(?string $lienSoundcloud): self
    {
        $this->lienSoundcloud = $lienSoundcloud;

        return $this;
    }

    public function getLienLinkedin(): ?string
    {
        return $this->lienLinkedin;
    }

    public function setLienLinkedin(?string $lienLinkedin): self
    {
        $this->lienLinkedin = $lienLinkedin;

        return $this;
    }

    public function getLienPerso(): ?string
    {
        return $this->lienPerso;
    }

    public function setLienPerso(?string $lienPerso): self
    {
        $this->lienPerso = $lienPerso;

        return $this;
    }

    public function getIframeSon1(): ?string
    {
        return $this->iframeSon1;
    }

    public function setIframeSon1(?string $iframeSon1): self
    {
        $this->iframeSon1 = $iframeSon1;

        return $this;
    }

    public function getIframeSon2(): ?string
    {
        return $this->iframeSon2;
    }

    public function setIframeSon2(?string $iframeSon2): self
    {
        $this->iframeSon2 = $iframeSon2;

        return $this;
    }

    public function getIframeSon3(): ?string
    {
        return $this->iframeSon3;
    }

    public function setIframeSon3(?string $iframeSon3): self
    {
        $this->iframeSon3 = $iframeSon3;

        return $this;
    }

    public function getIframeVideo1(): ?string
    {
        return $this->iframeVideo1;
    }

    public function setIframeVideo1(?string $iframeVideo1): self
    {
        $this->iframeVideo1 = $iframeVideo1;

        return $this;
    }

    public function getIframeVideo2(): ?string
    {
        return $this->iframeVideo2;
    }

    public function setIframeVideo2(?string $iframeVideo2): self
    {
        $this->iframeVideo2 = $iframeVideo2;

        return $this;
    }

    public function getIframeVideo3(): ?string
    {
        return $this->iframeVideo3;
    }

    public function setIframeVideo3(?string $iframeVideo3): self
    {
        $this->iframeVideo3 = $iframeVideo3;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param $categorie
     * @return Artiste
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }


}
