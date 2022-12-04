<?php

namespace App\Entity;

use App\Repository\CategoryAdherentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryAdherentRepository::class)]
class CategoryAdherent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $annee = null;

    #[ORM\OneToMany(mappedBy: 'categoryAdherent', targetEntity: categorie::class)]
    private Collection $categorie;

    #[ORM\ManyToOne(inversedBy: 'categoryAdherents')]
    private ?adherent $adherent = null;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

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
            $categorie->setCategoryAdherent($this);
        }

        return $this;
    }

    public function removeCategorie(categorie $categorie): self
    {
        if ($this->categorie->removeElement($categorie)) {
            // set the owning side to null (unless already changed)
            if ($categorie->getCategoryAdherent() === $this) {
                $categorie->setCategoryAdherent(null);
            }
        }

        return $this;
    }

    public function getAdherent(): ?adherent
    {
        return $this->adherent;
    }

    public function setAdherent(?adherent $adherent): self
    {
        $this->adherent = $adherent;

        return $this;
    }
}
