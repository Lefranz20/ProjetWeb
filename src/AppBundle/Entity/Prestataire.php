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
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscription", type="datetime", length=255)
     */
    private $dateInscription;


    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur",inversedBy="prestataire")
     * @ORM\JoinColumn(name="utilisateur_id",referencedColumnName="id",nullable=false,unique=true)
     *
     */
    private $utilisateur;

    /**
     * @ORM\OneToMany(targetEntity="Stage",mappedBy="prestataire")
     */
    private $stage;

    /**
     * @ORM\OneToMany(targetEntity="Promotion",mappedBy="prestataire")
     */
    private $promotion;

    /**
     * @ORM\ManyToMany(targetEntity="CategorieDeService", inversedBy="prestataire")
     */
    private $categorie_service;

    /**
     * @ORM\OneToMany(targetEntity="Commentaire",mappedBy="prestataire")
     */
    private $commentaire;

    /**
     * @ORM\OneToMany(targetEntity="Image",mappedBy="prestataire")
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="Internaute",inversedBy="prestataire")
     * @ORM\JoinTable(name="favori")
     */
    private $internaute;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stage = new \Doctrine\Common\Collections\ArrayCollection();
        $this->promotion = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categorie_service = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commentaire = new \Doctrine\Common\Collections\ArrayCollection();
        $this->image = new \Doctrine\Common\Collections\ArrayCollection();
        $this->internaute = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateInscription = new \DateTime();
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
     * Set utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Prestataire
     */
    public function setUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
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
        $this->stage[] = $stage;

        return $this;
    }

    /**
     * Remove stage
     *
     * @param \AppBundle\Entity\Stage $stage
     */
    public function removeStage(\AppBundle\Entity\Stage $stage)
    {
        $this->stage->removeElement($stage);
    }

    /**
     * Get stage
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStage()
    {
        return $this->stage;
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
        $this->categorie_service[] = $categorieService;

        return $this;
    }

    /**
     * Remove categorieService
     *
     * @param \AppBundle\Entity\CategorieDeService $categorieService
     */
    public function removeCategorieService(\AppBundle\Entity\CategorieDeService $categorieService)
    {
        $this->categorie_service->removeElement($categorieService);
    }

    /**
     * Get categorieService
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategorieService()
    {
        return $this->categorie_service;
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
        $this->commentaire[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \AppBundle\Entity\Commentaire $commentaire
     */
    public function removeCommentaire(\AppBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaire->removeElement($commentaire);
    }

    /**
     * Get commentaire
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaire()
    {
        return $this->commentaire;
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
        $this->image[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \AppBundle\Entity\Image $image
     */
    public function removeImage(\AppBundle\Entity\Image $image)
    {
        $this->image->removeElement($image);
    }

    /**
     * Get image
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImage()
    {
        return $this->image;
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
        $this->internaute[] = $internaute;

        return $this;
    }

    /**
     * Remove internaute
     *
     * @param \AppBundle\Entity\Internaute $internaute
     */
    public function removeInternaute(\AppBundle\Entity\Internaute $internaute)
    {
        $this->internaute->removeElement($internaute);
    }

    /**
     * Get internaute
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInternaute()
    {
        return $this->internaute;
    }

    /**
     * Set dateInscription
     *
     * @param \DateTime $dateInscription
     *
     * @return Prestataire
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
     * Get dateInscription
     *
     * @return \DateTime
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }
}
