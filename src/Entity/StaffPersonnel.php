<?php

namespace App\Entity;

use App\Repository\StaffPersonnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StaffPersonnelRepository::class)]
class StaffPersonnel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $MotDePasse = null;

    #[ORM\ManyToMany(targetEntity: Entrainement::class, mappedBy: 'staffPersonnel')]
    private Collection $staffPersonnel;

    public function __construct()
    {
        $this->staffPersonnel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

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

    public function getMotDePasse(): ?string
    {
        return $this->MotDePasse;
    }

    public function setMotDePasse(string $MotDePasse): self
    {
        $this->MotDePasse = $MotDePasse;

        return $this;
    }

    /**
     * @return Collection<int, Entrainement>
     */
    public function getStaffPersonnel(): Collection
    {
        return $this->staffPersonnel;
    }

    public function addStaffPersonnel(Entrainement $staffPersonnel): self
    {
        if (!$this->staffPersonnel->contains($staffPersonnel)) {
            $this->staffPersonnel->add($staffPersonnel);
            $staffPersonnel->addStaffPersonnel($this);
        }

        return $this;
    }

    public function removeStaffPersonnel(Entrainement $staffPersonnel): self
    {
        if ($this->staffPersonnel->removeElement($staffPersonnel)) {
            $staffPersonnel->removeStaffPersonnel($this);
        }

        return $this;
    }
}
