<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?int $ageMini = null;

    #[ORM\Column(nullable: true)]
    private ?int $ageMaxi = null;

    #[ORM\ManyToMany(targetEntity: pole::class)]
    private Collection $pole;

    #[ORM\ManyToMany(targetEntity: Entrainement::class, mappedBy: 'categorie')]
    private Collection $entrainements;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: CategorieAdherent::class)]
    private Collection $adherents;

    public function __construct()
    {
        $this->pole = new ArrayCollection();
        $this->entrainements = new ArrayCollection();
        $this->adherents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAgeMini(): ?int
    {
        return $this->ageMini;
    }

    public function setAgeMini(?int $ageMini): self
    {
        $this->ageMini = $ageMini;

        return $this;
    }

    public function getAgeMaxi(): ?int
    {
        return $this->ageMaxi;
    }

    public function setAgeMaxi(?int $ageMaxi): self
    {
        $this->ageMaxi = $ageMaxi;

        return $this;
    }

    /**
     * @return Collection<int, pole>
     */
    public function getPole(): Collection
    {
        return $this->pole;
    }

    public function addPole(pole $pole): self
    {
        if (!$this->pole->contains($pole)) {
            $this->pole->add($pole);
        }

        return $this;
    }

    public function removePole(pole $pole): self
    {
        $this->pole->removeElement($pole);

        return $this;
    }

    /**
     * @return Collection<int, Entrainement>
     */
    public function getEntrainements(): Collection
    {
        return $this->entrainements;
    }

    public function addEntrainement(Entrainement $entrainement): self
    {
        if (!$this->entrainements->contains($entrainement)) {
            $this->entrainements->add($entrainement);
            $entrainement->addCategorie($this);
        }

        return $this;
    }

    public function removeEntrainement(Entrainement $entrainement): self
    {
        if ($this->entrainements->removeElement($entrainement)) {
            $entrainement->removeCategorie($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, CategorieAdherent>
     */
    public function getAdherents(): Collection
    {
        return $this->adherents;
    }

    public function addAdherent(CategorieAdherent $adherent): self
    {
        if (!$this->adherents->contains($adherent)) {
            $this->adherents->add($adherent);
            $adherent->setCategorie($this);
        }

        return $this;
    }

    public function removeAdherent(CategorieAdherent $adherent): self
    {
        if ($this->adherents->removeElement($adherent)) {
            // set the owning side to null (unless already changed)
            if ($adherent->getCategorie() === $this) {
                $adherent->setCategorie(null);
            }
        }

        return $this;
    }
}
