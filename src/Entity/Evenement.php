<?php

namespace App\Entity;
use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
/**
 * Evenement
 *
 * @ORM\Entity(repositoryClass=EvenementRepository::class)
 */
class Evenement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",name="ID_Event")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Event", type="string", length=50, nullable=false)
     */
    private $nomEvent;

    /**
     * @var int
     *
     * @ORM\Column(name="Nbr_participants", type="integer", nullable=false)
     */
    private $nbrParticipants;

    /**
     * @var string
     *
     * @ORM\Column(name="Date_Event", type="string", length=50, nullable=false)
     */
    private $dateEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="Type_Event", type="string", length=0, nullable=false)
     */
    private $typeEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="Event_Visibilite", type="string", length=0, nullable=false)
     */
    private $eventVisibilite;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=50, nullable=false)
     */
    private $description;

    /**
     *
     * @ORM\Column(name="Date_P", type="datetime", nullable=false)
     */
    private $dateP;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rencontre", mappedBy="evenement")
     */
    private $rencontres;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SalleCinema",mappedBy="evenement")
     */
    private $salleCinema;

    /**
     * @var \Utilisateurs
     *
     * @ORM\ManyToOne(targetEntity="Utilisateurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_Utilisateur", referencedColumnName="ID_Utilisateur")
     * })
     */
    private $idUtilisateur;

    public function getNomEvent(): ?string
    {
        return $this->nomEvent;
    }

    public function setNomEvent(string $nomEvent): self
    {
        $this->nomEvent = $nomEvent;

        return $this;
    }

    public function getNbrParticipants(): ?int
    {
        return $this->nbrParticipants;
    }

    public function setNbrParticipants(int $nbrParticipants): self
    {
        $this->nbrParticipants = $nbrParticipants;

        return $this;
    }

    public function getDateEvent(): ?string
    {
        return $this->dateEvent;
    }

    public function setDateEvent(string $dateEvent): self
    {
        $this->dateEvent = $dateEvent;

        return $this;
    }

    public function getTypeEvent(): ?string
    {
        return $this->typeEvent;
    }

    public function setTypeEvent(string $typeEvent): self
    {
        $this->typeEvent = $typeEvent;

        return $this;
    }

    public function getEventVisibilite(): ?string
    {
        return $this->eventVisibilite;
    }

    public function setEventVisibilite(string $eventVisibilite): self
    {
        $this->eventVisibilite = $eventVisibilite;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateP()
    {
        return $this->dateP;
    }

    public function setDateP($dateP)
    {
        $this->dateP = $dateP;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateurs
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?Utilisateurs $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    public function __construct()
    {
        $this->rencontres=new ArrayCollection();
        $this->salleCinema=new ArrayCollection();
    }
    public function getRencontres(): Collection
    {
        return $this->rencontres;
    }
    public function removeRencontre(Rencontre $rencontre){
        if($this->rencontres->removeElement($rencontre)){
             if($rencontre->getIdEvent()===$this){
                 $rencontre->setIdEvent(null);
             }
        }
    }
    public function addRencontre(Rencontre $rencontre){
        $this->rencontres[]=$rencontre;
        return $this;
    }

    public function getSallesCinema(): Collection
    {
        return $this->salleCinema;
    }
    public function removeSalleCinema(SalleCinema $salleCinema){
        if($this->salleCinema->removeElement($salleCinema)){
             if($salleCinema->getIdEvent()===$this){
                 $salleCinema->setIdEvent(null);
             }
        }
    }
    public function addSalleCinema(Rencontre $salleCinema){
        $this->salleCinema[]=$salleCinema;
        return $this;
    }
    public function getId(): ?int
    {
        return $this->id;
    }
}
