<?php

namespace App\Entity;
use App\Repository\UtilisateursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateurs
 *
 * @ORM\Table(name="utilisateurs")
 * @ORM\Entity(repositoryClass=UtilisateursRepository::class)
 */
class Utilisateurs
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_Utilisateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="datenaissance", type="string", length=30, nullable=false)
     */
    private $datenaissance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="genre", type="string", length=0, nullable=true, options={"default"="NULL"})
     */
    private $genre = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="num_tel", type="string", length=12, nullable=false)
     */
    private $numTel;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="avatar", type="string", length=200, nullable=true, options={"default"="NULL"})
     */
    private $avatar = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=220, nullable=false)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="type_user", type="string", length=0, nullable=false, options={"default"="'User'"})
     */
    private $typeUser = '\'User\'';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="passwordRequestedAt", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $passwordrequestedat = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Token", type="string", length=200, nullable=true, options={"default"="NULL"})
     */
    private $token = 'NULL';

    /**
     * @var bool
     *
     * @ORM\Column(name="activated", type="boolean", nullable=false)
     */
    private $activated;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nbsignal", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $nbsignal = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="evaluation", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $evaluation = NULL;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="sponsor", type="boolean", nullable=true)
     */
    private $sponsor = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="desactivated", type="boolean", nullable=true)
     */
    private $desactivated = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $creationDate = 'current_timestamp()';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCollab = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDatenaissance(): ?string
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(string $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getNumTel(): ?string
    {
        return $this->numTel;
    }

    public function setNumTel(string $numTel): self
    {
        $this->numTel = $numTel;

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

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

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

    public function getTypeUser(): ?string
    {
        return $this->typeUser;
    }

    public function setTypeUser(string $typeUser): self
    {
        $this->typeUser = $typeUser;

        return $this;
    }

    public function getPasswordrequestedat(): ?\DateTimeInterface
    {
        return $this->passwordrequestedat;
    }

    public function setPasswordrequestedat(?\DateTimeInterface $passwordrequestedat): self
    {
        $this->passwordrequestedat = $passwordrequestedat;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getActivated(): ?bool
    {
        return $this->activated;
    }

    public function setActivated(bool $activated): self
    {
        $this->activated = $activated;

        return $this;
    }

    public function getNbsignal(): ?int
    {
        return $this->nbsignal;
    }

    public function setNbsignal(?int $nbsignal): self
    {
        $this->nbsignal = $nbsignal;

        return $this;
    }

    public function getEvaluation(): ?int
    {
        return $this->evaluation;
    }

    public function setEvaluation(?int $evaluation): self
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    public function getSponsor(): ?bool
    {
        return $this->sponsor;
    }

    public function setSponsor(?bool $sponsor): self
    {
        $this->sponsor = $sponsor;

        return $this;
    }

    public function getDesactivated(): ?bool
    {
        return $this->desactivated;
    }

    public function setDesactivated(?bool $desactivated): self
    {
        $this->desactivated = $desactivated;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }



}
