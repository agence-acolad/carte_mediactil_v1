<?php

namespace App\Entity;

use App\Entity\Categorie;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 * @Vich\Uploadable
 */
class Produit
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string|null
     */
    private $photo;

    /**
     * @Vich\UploadableField(mapping="featured_images", fileNameProperty="photo")
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ubereats;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $deliveroo;

    /**
     * @ORM\ManyToMany(targetEntity=Categorie::class, inversedBy="produits")
     */
    private $categories;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updated_at;

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

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descEn;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descEs;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descDe;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descIt;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $prixOptionnel;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @param null|File $imageFile
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            $this->updated_at = new \DateTime('now');
        }
    }
    
    /**
     * @return null|File
     */

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getUbereats(): ?bool
    {
        return $this->ubereats;
    }

    public function setUbereats(?bool $ubereats): self
    {
        $this->ubereats = $ubereats;

        return $this;
    }

    public function getDeliveroo(): ?bool
    {
        return $this->deliveroo;
    }

    public function setDeliveroo(?bool $deliveroo): self
    {
        $this->deliveroo = $deliveroo;

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function setCategories(Categorie $category): self
    {
        $this->category = $category;
        return $this;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Categorie $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

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

    public function getDescEn(): ?string
    {
        return $this->descEn;
    }

    public function setDescEn(?string $descEn): self
    {
        $this->descEn = $descEn;

        return $this;
    }

    public function getDescEs(): ?string
    {
        return $this->descEs;
    }

    public function setDescEs(?string $descEs): self
    {
        $this->descEs = $descEs;

        return $this;
    }

    public function getDescDe(): ?string
    {
        return $this->descDe;
    }

    public function setDescDe(?string $descDe): self
    {
        $this->descDe = $descDe;

        return $this;
    }

    public function getDescIt(): ?string
    {
        return $this->descIt;
    }

    public function setDescIt(?string $descIt): self
    {
        $this->descIt = $descIt;

        return $this;
    }

    public function getPrixOptionnel(): ?string
    {
        return $this->prixOptionnel;
    }

    public function setPrixOptionnel(?string $prixOptionnel): self
    {
        $this->prixOptionnel = $prixOptionnel;

        return $this;
    }
}
