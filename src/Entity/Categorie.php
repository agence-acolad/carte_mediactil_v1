<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
     * @ORM\ManyToMany(targetEntity=Produit::class, mappedBy="categories")
     */
    private $produits;

    /**
     * @ORM\ManyToMany(targetEntity=Onglet::class, mappedBy="ongletCategories")
     */
    private $onglets;

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
        $this->produits = new ArrayCollection();
        $this->onglets = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom;
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
     * @return Collection|Produit[]
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->addCategory($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            $produit->removeCategory($this);
        }

        return $this;
    }

    /**
     * @return Collection|Onglet[]
     */
    public function getOnglets(): Collection
    {
        return $this->onglets;
    }

    public function addOnglet(Onglet $onglet): self
    {
        if (!$this->onglets->contains($onglet)) {
            $this->onglets[] = $onglet;
            $onglet->addOngletCategory($this);
        }

        return $this;
    }

    public function removeOnglet(Onglet $onglet): self
    {
        if ($this->onglets->removeElement($onglet)) {
            $onglet->removeOngletCategory($this);
        }

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
