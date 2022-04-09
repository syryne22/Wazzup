<?php

namespace App\Entity;
use App\Repository\RencontreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Rencontre
 *
 * @ORM\Table(name="rencontre", indexes={@ORM\Index(name="rencontre_event", columns={"ID_Event"})})
 * @ORM\Entity(repositoryClass=RencontreRepository::class)
 */
class Rencontre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",name="ID_Ren")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Type_Rencontre", type="string", length=0, nullable=false)
     */
    private $typeRencontre;

    /**
     * @var string
     *
     * @ORM\Column(name="URL_Invitation", type="string", length=50, nullable=false)
     */
    private $urlInvitation;

    /**
     * @var \Evenement
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Evenement", inversedBy="rencontres")
     */
    private $idEvent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeRencontre(): ?string
    {
        return $this->typeRencontre;
    }

    public function setTypeRencontre(string $typeRencontre): self
    {
        $this->typeRencontre = $typeRencontre;

        return $this;
    }

    public function getUrlInvitation(): ?string
    {
        return $this->urlInvitation;
    }

    public function setUrlInvitation(string $urlInvitation): self
    {
        $this->urlInvitation = $urlInvitation;

        return $this;
    }

    public function getIdEvent(): ?Evenement
    {
        return $this->idEvent;
    }

    public function setIdEvent(?Evenement $idEvent): self
    {
        $this->idEvent = $idEvent;

        return $this;
    }
}
