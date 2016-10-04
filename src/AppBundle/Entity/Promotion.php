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
     * @var string
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
     * @ORM\Column(name="debut", type="date")
     */
    private $debut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin", type="date")
     */
    private $fin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="affichageDebut", type="date")
     */
    private $affichageDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="affichageFin", type="date")
     */
    private $affichageFin;

    /**
     *@ORM\ManyToOne(targetEntity="Prestataire",inversedBy="promotion")
     */
    private $prestataires;

    /**
     * @ORM\ManyToOne(targetEntity="CategorieDeService",inversedBy="promotions")
     */
    private $categories_services;


    /**
     * Get id
     *
     * @return int
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
     * Set debut
     *
     * @param \DateTime $debut
     *
     * @return Promotion
     */
    public function setDebut($debut)
    {
        $this->debut = $debut;

        return $this;
    }

    /**
     * Get debut
     *
     * @return \DateTime
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * Set fin
     *
     * @param \DateTime $fin
     *
     * @return Promotion
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return \DateTime
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Set affichageDebut
     *
     * @param \DateTime $affichageDebut
     *
     * @return Promotion
     */
    public function setAffichageDebut($affichageDebut)
    {
        $this->affichageDebut = $affichageDebut;

        return $this;
    }

    /**
     * Get affichageDebut
     *
     * @return \DateTime
     */
    public function getAffichageDebut()
    {
        return $this->affichageDebut;
    }

    /**
     * Set affichageFin
     *
     * @param \DateTime $affichageFin
     *
     * @return Promotion
     */
    public function setAffichageFin($affichageFin)
    {
        $this->affichageFin = $affichageFin;

        return $this;
    }

    /**
     * Get affichageFin
     *
     * @return \DateTime
     */
    public function getAffichageFin()
    {
        return $this->affichageFin;
    }

    /**
     * Set prestataires
     *
     * @param \AppBundle\Entity\Prestataire $prestataires
     *
     * @return Promotion
     */
    public function setPrestataires(\AppBundle\Entity\Prestataire $prestataires = null)
    {
        $this->prestataires = $prestataires;

        return $this;
    }

    /**
     * Get prestataires
     *
     * @return \AppBundle\Entity\Prestataire
     */
    public function getPrestataires()
    {
        return $this->prestataires;
    }

    /**
     * Set categoriesServices
     *
     * @param \AppBundle\Entity\CategorieDeService $categoriesServices
     *
     * @return Promotion
     */
    public function setCategoriesServices(\AppBundle\Entity\CategorieDeService $categoriesServices = null)
    {
        $this->categories_services = $categoriesServices;

        return $this;
    }

    /**
     * Get categoriesServices
     *
     * @return \AppBundle\Entity\CategorieDeService
     */
    public function getCategoriesServices()
    {
        return $this->categories_services;
    }
}
