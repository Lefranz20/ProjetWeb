<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * CategorieDeService
 *
 * @ORM\Table(name="categorie_de_service")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategorieDeServiceRepository")
 * @Vich\Uploadable
 */
class CategorieDeService
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var text
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="slider", type="boolean",nullable=true)
     */
    private $slider;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="image_slider", fileNameProperty="imageName")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(name="image_name",type="string", length=255)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(name="updated_at",type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="en_avant", type="boolean",nullable=true)
     */
    private $enAvant;

    /**
     * @var bool
     *
     * @ORM\Column(name="valide", type="boolean",nullable=true)
     */
    private $valide;

    /**
     * @Gedmo\Slug(fields={"nom"})
     * @ORM\Column(length=128,unique=true)
     */
    private $slug;

    /**
     *@ORM\ManyToMany(targetEntity="Prestataire",mappedBy="categorieService",cascade={"persist"})
     * @ORM\JoinColumn(name="prestataire_id",referencedColumnName="id",nullable=true)
     *
     */
    private $prestataire;

    /**
     *@ORM\OneToMany(targetEntity="Promotion",mappedBy="categories_service")
     * @ORM\JoinColumn(nullable=true)
     */
    private $promotions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prestataire = new \Doctrine\Common\Collections\ArrayCollection();
        $this->promotions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return CategorieDeService
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return CategorieDeService
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set enAvant
     *
     * @param boolean $enAvant
     *
     * @return CategorieDeService
     */
    public function setEnAvant($enAvant)
    {
        $this->enAvant = $enAvant;

        return $this;
    }

    /**
     * Get enAvant
     *
     * @return boolean
     */
    public function getEnAvant()
    {
        return $this->enAvant;
    }

    /**
     * Set valide
     *
     * @param boolean $valide
     *
     * @return CategorieDeService
     */
    public function setValide($valide)
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * Get valide
     *
     * @return boolean
     */
    public function getValide()
    {
        return $this->valide;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return CategorieDeService
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add prestataire
     *
     * @param \AppBundle\Entity\Prestataire $prestataire
     *
     * @return CategorieDeService
     */
    public function addPrestataire(\AppBundle\Entity\Prestataire $prestataire)
    {
        $this->prestataire[] = $prestataire;

        return $this;
    }

    /**
     * Remove prestataire
     *
     * @param \AppBundle\Entity\Prestataire $prestataire
     */
    public function removePrestataire(\AppBundle\Entity\Prestataire $prestataire)
    {
        $this->prestataire->removeElement($prestataire);
    }

    /**
     * Get prestataire
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrestataire()
    {
        return $this->prestataire;
    }

    /**
     * Add promotion
     *
     * @param \AppBundle\Entity\Promotion $promotion
     *
     * @return CategorieDeService
     */
    public function addPromotion(\AppBundle\Entity\Promotion $promotion)
    {
        $this->promotions[] = $promotion;

        return $this;
    }

    /**
     * Remove promotion
     *
     * @param \AppBundle\Entity\Promotion $promotion
     */
    public function removePromotion(\AppBundle\Entity\Promotion $promotion)
    {
        $this->promotions->removeElement($promotion);
    }

    /**
     * Get promotions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPromotions()
    {
        return $this->promotions;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return CategorieDeService
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }


    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return CategorieDeService
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string|null
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return CategorieDeService
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set slider
     *
     * @param boolean $slider
     *
     * @return CategorieDeService
     */
    public function setSlider($slider)
    {
        $this->slider = $slider;

        return $this;
    }

    /**
     * Get slider
     *
     * @return boolean
     */
    public function getSlider()
    {
        return $this->slider;
    }

    public function __toString()
    {
        return $this->getSlug();
    }
}
