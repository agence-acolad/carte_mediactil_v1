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

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomEn;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomEs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomDe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomIt;

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

    public function setOngletCategories(Categorie $ongletcategorie): self
    {
        $this->categorie = $ongletcategorie;
        return $this;
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

    public function getNomEn(): ?string
    {
        return $this->nomEn;
    }

    public function setNomEn(?string $nomEn): self
    {
        $this->nomEn = $nomEn;

        return $this;
    }

    public function getNomEs(): ?string
    {
        return $this->nomEs;
    }

    public function setNomEs(?string $nomEs): self
    {
        $this->nomEs = $nomEs;

        return $this;
    }

    public function getNomDe(): ?string
    {
        return $this->nomDe;
    }

    public function setNomDe(?string $nomDe): self
    {
        $this->nomDe = $nomDe;

        return $this;
    }

    public function getNomIt(): ?string
    {
        return $this->nomIt;
    }

    public function setNomIt(?string $nomIt): self
    {
        $this->nomIt = $nomIt;

        return $this;
    }
}
