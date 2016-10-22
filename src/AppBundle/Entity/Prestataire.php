<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Prestataire
 *
 * @ORM\Table(name="prestataire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PrestataireRepository")
 */
class Prestataire
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
     * @ORM\Column(name="web", type="string", length=255)
     */
    private $web;

    /**
     * @var string
     *
     * @ORM\Column(name="email_de_contact", type="string", length=255)
     */
    private $emailDeContact;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_tva", type="string", length=255)
     */
    private $numeroTva;


    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur",inversedBy="prestataires")
     * @ORM\JoinColumn(name="utilisateur_id",referencedColumnName="id",nullable=false)
     */
    private $utilisateurs;

    /**
     * @ORM\OneToMany(targetEntity="Stage",mappedBy="prestataires")
     */
    private $stages;

    /**
     * @ORM\OneToMany(targetEntity="Promotion",mappedBy="prestataires")
     */
    private $promotion;

    /**
     * @ORM\ManyToMany(targetEntity="CategorieDeService", inversedBy="prestataires")
     */
    private $categorie_services;

    /**
     * @ORM\OneToMany(targetEntity="Commentaire",mappedBy="prestataires")
     */
    private $commentaires;

    /**
     * @ORM\OneToMany(targetEntity="Image",mappedBy="prestataires")
     */
    private $images;

    /**
     * @ORM\ManyToMany(targetEntity="Internaute",inversedBy="prestataires")
     * @ORM\JoinTable(name="favori")
     */
    private $internautes;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->promotion = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categorie_services = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
        $this->internautes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Prestataire
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
     * @return Prestataire
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
     * Set web
     *
     * @param string $web
     *
     * @return Prestataire
     */
    public function setWeb($web)
    {
        $this->web = $web;

        return $this;
    }

    /**
     * Get web
     *
     * @return string
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set emailDeContact
     *
     * @param string $emailDeContact
     *
     * @return Prestataire
     */
    public function setEmailDeContact($emailDeContact)
    {
        $this->emailDeContact = $emailDeContact;

        return $this;
    }

    /**
     * Get emailDeContact
     *
     * @return string
     */
    public function getEmailDeContact()
    {
        return $this->emailDeContact;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Prestataire
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set numeroTva
     *
     * @param string $numeroTva
     *
     * @return Prestataire
     */
    public function setNumeroTva($numeroTva)
    {
        $this->numeroTva = $numeroTva;

        return $this;
    }

    /**
     * Get numeroTva
     *
     * @return string
     */
    public function getNumeroTva()
    {
        return $this->numeroTva;
    }

    /**
     * Set utilisateurs
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateurs
     *
     * @return Prestataire
     */
    public function setUtilisateurs(\AppBundle\Entity\Utilisateur $utilisateurs)
    {
        $this->utilisateurs = $utilisateurs;

        return $this;
    }

    /**
     * Get utilisateurs
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }

    /**
     * Add stage
     *
     * @param \AppBundle\Entity\Stage $stage
     *
     * @return Prestataire
     */
    public function addStage(\AppBundle\Entity\Stage $stage)
    {
        $this->stages[] = $stage;

        return $this;
    }

    /**
     * Remove stage
     *
     * @param \AppBundle\Entity\Stage $stage
     */
    public function removeStage(\AppBundle\Entity\Stage $stage)
    {
        $this->stages->removeElement($stage);
    }

    /**
     * Get stages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStages()
    {
        return $this->stages;
    }

    /**
     * Add promotion
     *
     * @param \AppBundle\Entity\Promotion $promotion
     *
     * @return Prestataire
     */
    public function addPromotion(\AppBundle\Entity\Promotion $promotion)
    {
        $this->promotion[] = $promotion;

        return $this;
    }

    /**
     * Remove promotion
     *
     * @param \AppBundle\Entity\Promotion $promotion
     */
    public function removePromotion(\AppBundle\Entity\Promotion $promotion)
    {
        $this->promotion->removeElement($promotion);
    }

    /**
     * Get promotion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * Add categorieService
     *
     * @param \AppBundle\Entity\CategorieDeService $categorieService
     *
     * @return Prestataire
     */
    public function addCategorieService(\AppBundle\Entity\CategorieDeService $categorieService)
    {
        $this->categorie_services[] = $categorieService;

        return $this;
    }

    /**
     * Remove categorieService
     *
     * @param \AppBundle\Entity\CategorieDeService $categorieService
     */
    public function removeCategorieService(\AppBundle\Entity\CategorieDeService $categorieService)
    {
        $this->categorie_services->removeElement($categorieService);
    }

    /**
     * Get categorieServices
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategorieServices()
    {
        return $this->categorie_services;
    }

    /**
     * Add commentaire
     *
     * @param \AppBundle\Entity\Commentaire $commentaire
     *
     * @return Prestataire
     */
    public function addCommentaire(\AppBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \AppBundle\Entity\Commentaire $commentaire
     */
    public function removeCommentaire(\AppBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaires->removeElement($commentaire);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Add image
     *
     * @param \AppBundle\Entity\Image $image
     *
     * @return Prestataire
     */
    public function addImage(\AppBundle\Entity\Image $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \AppBundle\Entity\Image $image
     */
    public function removeImage(\AppBundle\Entity\Image $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Add internaute
     *
     * @param \AppBundle\Entity\Internaute $internaute
     *
     * @return Prestataire
     */
    public function addInternaute(\AppBundle\Entity\Internaute $internaute)
    {
        $this->internautes[] = $internaute;

        return $this;
    }

    /**
     * Remove internaute
     *
     * @param \AppBundle\Entity\Internaute $internaute
     */
    public function removeInternaute(\AppBundle\Entity\Internaute $internaute)
    {
        $this->internautes->removeElement($internaute);
    }

    /**
     * Get internautes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInternautes()
    {
        return $this->internautes;
    }
}
