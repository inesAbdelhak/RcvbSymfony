<?php

namespace App\Entity;

use App\Repository\EntrainementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrainementRepository::class)]
class Entrainement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $jour = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $HeureDebut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $HeureFin = null;

    #[ORM\ManyToMany(targetEntity: categorie::class, inversedBy: 'entrainements')]
    private Collection $categorie;

    #[ORM\ManyToMany(targetEntity: terrain::class)]
    private Collection $terrain;

    #[ORM\ManyToMany(targetEntity: staffPersonnel::class, inversedBy: 'staffPersonnel')]
    private Collection $staffPersonnel;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
        $this->terrain = new ArrayCollection();
        $this->staffPersonnel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?int
    {
        return $this->jour;
    }

    public function setJour(int $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->HeureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $HeureDebut): self
    {
        $this->HeureDebut = $HeureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->HeureFin;
    }

    public function setHeureFin(\DateTimeInterface $HeureFin): self
    {
        $this->HeureFin = $HeureFin;

        return $this;
    }

    /**
     * @return Collection<int, categorie>
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(categorie $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie->add($categorie);
        }

        return $this;
    }

    public function removeCategorie(categorie $categorie): self
    {
        $this->categorie->removeElement($categorie);

        return $this;
    }

    /**
     * @return Collection<int, terrain>
     */
    public function getTerrain(): Collection
    {
        return $this->terrain;
    }

    public function addTerrain(terrain $terrain): self
    {
        if (!$this->terrain->contains($terrain)) {
            $this->terrain->add($terrain);
        }

        return $this;
    }

    public function removeTerrain(terrain $terrain): self
    {
        $this->terrain->removeElement($terrain);

        return $this;
    }

    /**
     * @return Collection<int, staffPersonnel>
     */
    public function getStaffPersonnel(): Collection
    {
        return $this->staffPersonnel;
    }

    public function addStaffPersonnel(staffPersonnel $staffPersonnel): self
    {
        if (!$this->staffPersonnel->contains($staffPersonnel)) {
            $this->staffPersonnel->add($staffPersonnel);
        }

        return $this;
    }

    public function removeStaffPersonnel(staffPersonnel $staffPersonnel): self
    {
        $this->staffPersonnel->removeElement($staffPersonnel);

        return $this;
    }
}
