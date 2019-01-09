<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contenu
 *
 * @ORM\Table(name="contenu")
 * @ORM\Entity
 */
class contenu
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
     * @ORM\Column(name="summary_text1", type="text", length=0, nullable=false)
     */
    private $summaryText1;

    /**
     * @var string
     *
     * @ORM\Column(name="summary_lien1", type="string", length=90, nullable=false)
     */
    private $summaryLien1;

    /**
     * @var string
     *
     * @ORM\Column(name="summary_bouton1", type="string", length=20, nullable=false)
     */
    private $summaryBouton1;

    /**
     * @var string
     *
     * @ORM\Column(name="summary_text2", type="text", length=0, nullable=false)
     */
    private $summaryText2;

    /**
     * @var string
     *
     * @ORM\Column(name="summary_lien2", type="string", length=90, nullable=false)
     */
    private $summaryLien2;

    /**
     * @var string
     *
     * @ORM\Column(name="summary_bouton2", type="string", length=20, nullable=false)
     */
    private $summaryBouton2;

    /**
     * @var string
     *
     * @ORM\Column(name="image_pano_head", type="string", length=60, nullable=false)
     */
    private $imagePanoHead;

    /**
     * @var string
     *
     * @ORM\Column(name="image_pano_presentation", type="string", length=60, nullable=false)
     */
    private $imagePanoPresentation;

    /**
     * @var string
     *
     * @ORM\Column(name="image_pano_contact", type="string", length=60, nullable=false)
     */
    private $imagePanoContact;

    /**
     * @var string
     *
     * @ORM\Column(name="image_pano_inscription", type="string", length=60, nullable=false)
     */
    private $imagePanoInscription;

    /**
     * @var string
     *
     * @ORM\Column(name="image_pano_connexion", type="string", length=60, nullable=false)
     */
    private $imagePanoConnexion;

    /**
     * @var string
     *
     * @ORM\Column(name="image_pano_resultat", type="string", length=60, nullable=false)
     */
    private $imagePanoResultat;

    /**
     * @var string
     *
     * @ORM\Column(name="presentation_image", type="string", length=60, nullable=false)
     */
    private $presentationImage;

    /**
     * @var string
     *
     * @ORM\Column(name="presentation_text", type="text", length=0, nullable=false)
     */
    private $presentationText;

    /**
     * @var string
     *
     * @ORM\Column(name="mentions", type="text", length=0, nullable=false)
     */
    private $mentions;

    /**
     * @var string
     *
     * @ORM\Column(name="presse", type="text", length=0, nullable=false)
     */
    private $presse;

    /**
     * @var string
     *
     * @ORM\Column(name="presse_doc", type="string", length=90, nullable=false)
     */
    private $presseDoc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSummaryText1(): ?string
    {
        return $this->summaryText1;
    }

    public function setSummaryText1(string $summaryText1): self
    {
        $this->summaryText1 = $summaryText1;

        return $this;
    }

    public function getSummaryLien1(): ?string
    {
        return $this->summaryLien1;
    }

    public function setSummaryLien1(string $summaryLien1): self
    {
        $this->summaryLien1 = $summaryLien1;

        return $this;
    }

    public function getSummaryBouton1(): ?string
    {
        return $this->summaryBouton1;
    }

    public function setSummaryBouton1(string $summaryBouton1): self
    {
        $this->summaryBouton1 = $summaryBouton1;

        return $this;
    }

    public function getSummaryText2(): ?string
    {
        return $this->summaryText2;
    }

    public function setSummaryText2(string $summaryText2): self
    {
        $this->summaryText2 = $summaryText2;

        return $this;
    }

    public function getSummaryLien2(): ?string
    {
        return $this->summaryLien2;
    }

    public function setSummaryLien2(string $summaryLien2): self
    {
        $this->summaryLien2 = $summaryLien2;

        return $this;
    }

    public function getSummaryBouton2(): ?string
    {
        return $this->summaryBouton2;
    }

    public function setSummaryBouton2(string $summaryBouton2): self
    {
        $this->summaryBouton2 = $summaryBouton2;

        return $this;
    }

    public function getImagePanoHead(): ?string
    {
        return $this->imagePanoHead;
    }

    public function setImagePanoHead(string $imagePanoHead): self
    {
        $this->imagePanoHead = $imagePanoHead;

        return $this;
    }

    public function getImagePanoPresentation(): ?string
    {
        return $this->imagePanoPresentation;
    }

    public function setImagePanoPresentation(string $imagePanoPresentation): self
    {
        $this->imagePanoPresentation = $imagePanoPresentation;

        return $this;
    }

    public function getImagePanoContact(): ?string
    {
        return $this->imagePanoContact;
    }

    public function setImagePanoContact(string $imagePanoContact): self
    {
        $this->imagePanoContact = $imagePanoContact;

        return $this;
    }

    public function getImagePanoInscription(): ?string
    {
        return $this->imagePanoInscription;
    }

    public function setImagePanoInscription(string $imagePanoInscription): self
    {
        $this->imagePanoInscription = $imagePanoInscription;

        return $this;
    }

    public function getImagePanoConnexion(): ?string
    {
        return $this->imagePanoConnexion;
    }

    public function setImagePanoConnexion(string $imagePanoConnexion): self
    {
        $this->imagePanoConnexion = $imagePanoConnexion;

        return $this;
    }

    public function getImagePanoResultat(): ?string
    {
        return $this->imagePanoResultat;
    }

    public function setImagePanoResultat(string $imagePanoResultat): self
    {
        $this->imagePanoResultat = $imagePanoResultat;

        return $this;
    }

    public function getPresentationImage(): ?string
    {
        return $this->presentationImage;
    }

    public function setPresentationImage(string $presentationImage): self
    {
        $this->presentationImage = $presentationImage;

        return $this;
    }

    public function getPresentationText(): ?string
    {
        return $this->presentationText;
    }

    public function setPresentationText(string $presentationText): self
    {
        $this->presentationText = $presentationText;

        return $this;
    }

    public function getMentions(): ?string
    {
        return $this->mentions;
    }

    public function setMentions(string $mentions): self
    {
        $this->mentions = $mentions;

        return $this;
    }

    public function getPresse(): ?string
    {
        return $this->presse;
    }

    public function setPresse(string $presse): self
    {
        $this->presse = $presse;

        return $this;
    }

    public function getPresseDoc(): ?string
    {
        return $this->presseDoc;
    }

    public function setPresseDoc(string $presseDoc): self
    {
        $this->presseDoc = $presseDoc;

        return $this;
    }


}
