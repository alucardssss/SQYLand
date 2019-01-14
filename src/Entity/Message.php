<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="App\Repository\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="expediteur", type="string", length=60, nullable=false)
     * @Assert\NotBlank(message="Vous devez saisir votre adresse pour recevoir une réponse. ")
     * @Assert\Length(max="60",
     *  maxMessage="Vorte prénom est trop long. {{Limit}} caractères max. ")
     * @Assert\Email(
     *     message = "Le mail '{{ value }}' n'est pas valide. Veuillez vérifier ce champ",
     *     mode="html5"
     * )
     */
    private $expediteur;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=255, nullable=false)
     *
     */
    private $sujet;

    /**
     *
     * @ORM\Column(name="texte", type="text", length=0, nullable=false)
     * @Assert\NotBlank(message="Vous devez écrire un petit message . ")
     *
     */
    private $texte;

    /**
     * @var string|null
     *
     * @ORM\Column(name="liste", type="text", length=0, nullable=true)
     */
    private $liste;

    /**
     * @var string
     *
     * @ORM\Column(name="fichier", type="string", length=90, nullable=true)
     * @Assert\File(
     *     mimeTypesMessage="Vérifiez le format de votre fichier (pdf uniquement) ",
     *     maxSize="2M",
     *     maxSizeMessage="Votre pdf ne doit pas être supérieur à 2Mo",
     *     uploadNoFileErrorMessage="Il y 'a eu un problème pendant le téléchargement, veuillez réessayer SVP. ",
     *     uploadErrorMessage="Il y 'a eu un problème pendant le téléchargement, veuillez réessayer SVP. "
     * )
     *
     */
    private $fichier;

    #    mimeTypes={"application/pdf", "application/x-pdf"},

    /**
     * @var bool|null
     *
     * @ORM\Column(name="nouveau", type="boolean", nullable=true)
     */
    private $nouveau;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="en_cours", type="boolean", nullable=true)
     */
    private $enCours;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="termine", type="boolean", nullable=true)
     */
    private $termine;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="archive", type="boolean", nullable=true)
     */
    private $archive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExpediteur(): ?string
    {
        return $this->expediteur;
    }

    public function setExpediteur(string $expediteur): self
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    public function getListe(): ?string
    {
        return $this->liste;
    }

    public function setListe(?string $liste): self
    {
        $this->liste = $liste;

        return $this;
    }

    public function getFichier()
    {
        return $this->fichier;
    }

    public function setFichier($fichier): self
    {
        $this->fichier = $fichier;

        return $this;
    }

    public function getNouveau(): ?bool
    {
        return $this->nouveau;
    }

    public function setNouveau(?bool $nouveau): self
    {
        $this->nouveau = $nouveau;

        return $this;
    }

    public function getEnCours(): ?bool
    {
        return $this->enCours;
    }

    public function setEnCours(?bool $enCours): self
    {
        $this->enCours = $enCours;

        return $this;
    }

    public function getTermine(): ?bool
    {
        return $this->termine;
    }

    public function setTermine(?bool $termine): self
    {
        $this->termine = $termine;

        return $this;
    }

    public function getArchive(): ?bool
    {
        return $this->archive;
    }

    public function setArchive(?bool $archive): self
    {
        $this->archive = $archive;

        return $this;
    }


}
