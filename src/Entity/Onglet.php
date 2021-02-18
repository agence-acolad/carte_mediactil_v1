<?php

namespace App\Entity;

use App\Repository\OngletRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OngletRepository::class)
 */
class Onglet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity=Categorie::class, inversedBy="onglets")
     */
    private $ongletCategories;

    public function __construct()
    {
        $this->ongletCategories = new ArrayCollection();
    }

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

    /**
     * @return Collection|Categorie[]
     */
    public function getOngletCategories(): Collection
    {
        return $this->ongletCategories;
    }

    public function addOngletCategory(Categorie $ongletCategory): self
    {
        if (!$this->ongletCategories->contains($ongletCategory)) {
            $this->ongletCategories[] = $ongletCategory;
        }

        return $this;
    }

    public function removeOngletCategory(Categorie $ongletCategory): self
    {
        $this->ongletCategories->removeElement($ongletCategory);

        return $this;
    }
}
