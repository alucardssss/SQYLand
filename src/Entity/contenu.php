<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContenuRepository")
 */
class contenu
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
    private $image_pano_head;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $image_pano_presentation;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $image_pano_contact;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $image_pano_inscription;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $image_pano_connexion;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $image_pano_resultat;

    /**
     * @ORM\Column(type="text")
     */
    private $summary_text1;

    /**
     * @ORM\Column(type="string", length=90)
     */
    private $summary_lien1;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $summary_bouton1;

    /**
     * @ORM\Column(type="text")
     */
    private $summary_text2;

    /**
     * @ORM\Column(type="string", length=90)
     */
    private $summary_lien2;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $summary_bouton2;

    /**
     * @ORM\Column(type="string", length=90)
     */
    private $presentation_image;

    /**
     * @ORM\Column(type="text")
     */
    private $presentation_text;

    /**
     * @ORM\Column(type="text")
     */
    private $mentions;

    /**
     * @ORM\Column(type="text")
     */
    private $presse;

    /**
     * @ORM\Column(type="string", length=90)
     */
    private $presse_doc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImagePanoHead(): ?string
    {
        return $this->image_pano_head;
    }

    public function setImagePanoHead(string $image_pano_head): self
    {
        $this->image_pano_head = $image_pano_head;

        return $this;
    }

    public function getImagePanoPresentation(): ?string
    {
        return $this->image_pano_presentation;
    }

    public function setImagePanoPresentation(string $image_pano_presentation): self
    {
        $this->image_pano_presentation = $image_pano_presentation;

        return $this;
    }

    public function getImagePanoContact(): ?string
    {
        return $this->image_pano_contact;
    }

    public function setImagePanoContact(string $image_pano_contact): self
    {
        $this->image_pano_contact = $image_pano_contact;

        return $this;
    }

    public function getImagePanoInscription(): ?string
    {
        return $this->image_pano_inscription;
    }

    public function setImagePanoInscription(string $image_pano_inscription): self
    {
        $this->image_pano_inscription = $image_pano_inscription;

        return $this;
    }

    public function getImagePanoConnexion(): ?string
    {
        return $this->image_pano_connexion;
    }

    public function setImagePanoConnexion(string $image_pano_connexion): self
    {
        $this->image_pano_connexion = $image_pano_connexion;

        return $this;
    }

    public function getImagePanoResultat(): ?string
    {
        return $this->image_pano_resultat;
    }

    public function setImagePanoResultat(string $image_pano_resultat): self
    {
        $this->image_pano_resultat = $image_pano_resultat;

        return $this;
    }

    public function getSummaryText1(): ?string
    {
        return $this->summary_text1;
    }

    public function setSummaryText1(string $summary_text1): self
    {
        $this->summary_text1 = $summary_text1;

        return $this;
    }

    public function getSummaryLien1(): ?string
    {
        return $this->summary_lien1;
    }

    public function setSummaryLien1(string $summary_lien1): self
    {
        $this->summary_lien1 = $summary_lien1;

        return $this;
    }

    public function getSummaryBouton1(): ?string
    {
        return $this->summary_bouton1;
    }

    public function setSummaryBouton1(string $summary_bouton1): self
    {
        $this->summary_bouton1 = $summary_bouton1;

        return $this;
    }

    public function getSummaryText2(): ?string
    {
        return $this->summary_text2;
    }

    public function setSummaryText2(string $summary_text2): self
    {
        $this->summary_text2 = $summary_text2;

        return $this;
    }

    public function getSummaryLien2(): ?string
    {
        return $this->summary_lien2;
    }

    public function setSummaryLien2(string $summary_lien2): self
    {
        $this->summary_lien2 = $summary_lien2;

        return $this;
    }

    public function getSummaryBouton2(): ?string
    {
        return $this->summary_bouton2;
    }

    public function setSummaryBouton2(string $summary_bouton2): self
    {
        $this->summary_bouton2 = $summary_bouton2;

        return $this;
    }

    public function getPresentationImage(): ?string
    {
        return $this->presentation_image;
    }

    public function setPresentationImage(string $presentation_image): self
    {
        $this->presentation_image = $presentation_image;

        return $this;
    }

    public function getPresentationText(): ?string
    {
        return $this->presentation_text;
    }

    public function setPresentationText(string $presentation_text): self
    {
        $this->presentation_text = $presentation_text;

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
        return $this->presse_doc;
    }

    public function setPresseDoc(string $presse_doc): self
    {
        $this->presse_doc = $presse_doc;

        return $this;
    }
}
