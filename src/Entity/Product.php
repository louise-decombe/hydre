<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $illustration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subtitle;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Author;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Publisher;

    /**
     * @ORM\Column(type="integer")
     */
    private $Stock;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbe_pages;

    /**
     * @ORM\Column(type="integer")
     */
    private $year_of_publication;

    /**
     * @ORM\ManyToOne(targetEntity=Subcategory::class, inversedBy="products")
     */
    private $subcategory;


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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getIllustration(): ?string
    {
        return $this->illustration;
    }

    public function setIllustration(string $illustration): self
    {
        $this->illustration = $illustration;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->Author;
    }

    public function setAuthor(string $Author): self
    {
        $this->Author = $Author;

        return $this;
    }

    public function getPublisher(): ?string
    {
        return $this->Publisher;
    }

    public function setPublisher(string $Publisher): self
    {
        $this->Publisher = $Publisher;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->Stock;
    }

    public function setStock(int $Stock): self
    {
        $this->Stock = $Stock;

        return $this;
    }

    public function getNbePages(): ?int
    {
        return $this->nbe_pages;
    }

    public function setNbePages(int $nbe_pages): self
    {
        $this->nbe_pages = $nbe_pages;

        return $this;
    }

    public function getYearOfPublication(): ?int
    {
        return $this->year_of_publication;
    }

    public function setYearOfPublication(int $year_of_publication): self
    {
        $this->year_of_publication = $year_of_publication;

        return $this;
    }

  
        public function getSubcategory(): ?Subcategory
        {
            return $this->subcategory;
        }
        

    
    public function setSubcategory(?Subcategory $subcategory): self
    {
        $this->subcategory = $subcategory;

        return $this;
    }

   

}
