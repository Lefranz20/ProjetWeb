<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promotion
 *
 * @ORM\Table(name="promotion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PromotionRepository")
 */
class Promotion
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
     * @var string
     *
     * @ORM\Column(name="document", type="string", length=255)
     */
    private $document;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date")
     */
    private $dateFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_affichage_debut", type="date")
     */
    private $dateAffichageDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_affichage_fin", type="date")
     */
    private $dateAffichageFin;

    /**
     *@ORM\ManyToOne(targetEntity="Prestataire",inversedBy="promotions")
     * @ORM\JoinColumn(name="prestataire_id",referencedColumnName="id",nullable=false)
     */
    private $prestataire;

    /**
     * @ORM\ManyToOne(targetEntity="CategorieDeService",inversedBy="promotions")
     * @ORM\JoinColumn(name="categories_service_id",referencedColumnName="id")
     */
    private $categories_service;



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
     * @return Promotion
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
     * @return Promotion
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
     * Set document
     *
     * @param string $document
     *
     * @return Promotion
     */
    public function setDocument($document)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return string
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Promotion
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Promotion
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set dateAffichageDebut
     *
     * @param \DateTime $dateAffichageDebut
     *
     * @return Promotion
     */
    public function setDateAffichageDebut($dateAffichageDebut)
    {
        $this->dateAffichageDebut = $dateAffichageDebut;

        return $this;
    }

    /**
     * Get dateAffichageDebut
     *
     * @return \DateTime
     */
    public function getDateAffichageDebut()
    {
        return $this->dateAffichageDebut;
    }

    /**
     * Set dateAffichageFin
     *
     * @param \DateTime $dateAffichageFin
     *
     * @return Promotion
     */
    public function setDateAffichageFin($dateAffichageFin)
    {
        $this->dateAffichageFin = $dateAffichageFin;

        return $this;
    }

    /**
     * Get dateAffichageFin
     *
     * @return \DateTime
     */
    public function getDateAffichageFin()
    {
        return $this->dateAffichageFin;
    }

    /**
     * Set prestataire
     *
     * @param \AppBundle\Entity\Prestataire $prestataire
     *
     * @return Promotion
     */
    public function setPrestataire(\AppBundle\Entity\Prestataire $prestataire)
    {
        $this->prestataire = $prestataire;

        return $this;
    }

    /**
     * Get prestataire
     *
     * @return \AppBundle\Entity\Prestataire
     */
    public function getPrestataire()
    {
        return $this->prestataire;
    }

    /**
     * Set categoriesService
     *
     * @param \AppBundle\Entity\CategorieDeService $categoriesService
     *
     * @return Promotion
     */
    public function setCategoriesService(\AppBundle\Entity\CategorieDeService $categoriesService = null)
    {
        $this->categories_service = $categoriesService;

        return $this;
    }

    /**
     * Get categoriesService
     *
     * @return \AppBundle\Entity\CategorieDeService
     */
    public function getCategoriesService()
    {
        return $this->categories_service;
    }
}
