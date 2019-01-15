<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Artiste
 *
 * @ORM\Table(name="Artiste", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})}, indexes={@ORM\Index(name="projet_id", columns={"projet_id"})})
 * @ORM\Entity
 */
class Artiste implements UserInterface
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
     * @ORM\Column(name="nom", type="string", length=60, nullable=false)
     * * @Assert\NotBlank(message="saisisez votre nom")
     * @Assert\Length(max="60",
     * maxMessage="votre nom est trop long (( limit )) caractere max.")
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=60, nullable=false)
     * @Assert\Email(message="Verifier votre Email")
     * @Assert\NotBlank(message="saisisez votre email")
     * @Assert\Length(max="50",maxMessage="votre email est trop long (( limit )) caractere max.")
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(name="mdp", type="string", length=64, nullable=false)
     * @Assert\NotBlank(message="Noubliez pas votre mdp")
     * @Assert\Length(min="8" ,minMessage="votre mot de pase doit faire minimun 8 caractères")
     * @Assert\Regex(pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]+$/",
     * message="votre mot de passe doit contenir au moin ,une majuscule et un chiffre")
     */
    private $mdp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resume", type="text", length=0, nullable=true)
     */
    private $resume;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=60, nullable=true)
     */
    private $image;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscription", type="datetime", nullable=false)
     */
    private $dateInscription;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_connexion", type="datetime", nullable=true)
     */
    private $dateConnexion;

    /**
     * @var \Projet
     *
     * @ORM\ManyToOne(targetEntity="Projet")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projet_id", referencedColumnName="id")
     * })
     */
    private $projet;

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

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getDateConnexion(): ?\DateTimeInterface
    {
        return $this->dateConnexion;
    }

    public function setDateConnexion(?\DateTimeInterface $dateConnexion): self
    {
        $this->dateConnexion = $dateConnexion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * @param $projet
     * @return Artiste
     */
    public function setProjet( $projet)
    {
        $this->projet = $projet;

        return $this;
    }

    public function __construct()
    {
        $this->dateInscription = new \DateTime();
    }

    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return array('ROLE_USER');
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        #TODO: Implement getPassword() method.
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
