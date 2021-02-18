<?php

namespace App\Entity;

use App\Repository\SubcategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubcategoryRepository::class)
 */
class Subcategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;


    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="subcategories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="subcategory")
     */
    private $clear;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="subcategory")
     */
    private $products;

    public function __construct()
    {
        $this->clear = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

  
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }


    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getClear(): Collection
    {
        return $this->clear;
    }

    public function addClear(Product $clear): self
    {
        if (!$this->clear->contains($clear)) {
            $this->clear[] = $clear;
            $clear->setSubcategory($this);
        }

        return $this;
    }

    public function removeClear(Product $clear): self
    {
        if ($this->clear->removeElement($clear)) {
            // set the owning side to null (unless already changed)
            if ($clear->getSubcategory() === $this) {
                $clear->setSubcategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setSubcategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getSubcategory() === $this) {
                $product->setSubcategory(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

}
