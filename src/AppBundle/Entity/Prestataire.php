<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;


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
     * @ORM\Column(name="nom_entreprise", type="string", length=255)
     */
    private $nomEntreprise;

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
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255,nullable=true)
     */
    private $logo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscription", type="datetime", length=255)
     */
    private $dateInscription;

    /**
     * @Gedmo\Slug(fields={"nomEntreprise"})
     * @ORM\Column(length=128,unique=true)
     */
    private $pretataireSlug;


    /**
     * @ORM\OneToOne(targetEntity="Utilisateur",inversedBy="prestataire")
     * @ORM\JoinColumn(name="utilisateur_id",referencedColumnName="id",nullable=false)
     *
     */
    private $utilisateur;

    /**
     * @ORM\OneToMany(targetEntity="Stage",mappedBy="prestataire")
     */
    private $stages;

    /**
     * @ORM\OneToMany(targetEntity="Promotion",mappedBy="prestataire")
     */
    private $promotions;

    /**
     * @ORM\ManyToMany(targetEntity="CategorieDeService", inversedBy="prestataire")
     * @ORM\JoinColumn(nullable=true)
     */
    private $categorieService;

    /**
     * @ORM\OneToMany(targetEntity="Commentaire",mappedBy="prestataire")
     */
    private $commentaires;


    /**
     * @ORM\ManyToMany(targetEntity="Internaute",mappedBy="prestataire")
     * @ORM\JoinTable(name="favori")
     */
    private $internaute;

    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set nomEntreprise
     *
     * @param string $nomEntreprise
     *
     * @return Prestataire
     */
    public function setNomEntreprise($nomEntreprise)
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    /**
     * Get nomEntreprise
     *
     * @return string
     */
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
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
     * Set logo
     *
     * @param string $logo
     *
     * @return Prestataire
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
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
     * Add categorieService
     *
     * @param \AppBundle\Entity\CategorieDeService $categorieService
     *
     * @return Prestataire
     */
    public function addCategorieService(\AppBundle\Entity\CategorieDeService $categorieService)
    {
        $this->categorieService[] = $categorieService;

        return $this;
    }

    /**
     * Remove categorieService
     *
     * @param \AppBundle\Entity\CategorieDeService $categorieService
     */
    public function removeCategorieService(\AppBundle\Entity\CategorieDeService $categorieService)
    {
        $this->categorieService->removeElement($categorieService);
    }

    /**
     * Get categorieService
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategorieService()
    {
        return $this->categorieService;
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
     * Set pretataireSlug
     *
     * @param string $pretataireSlug
     *
     * @return Prestataire
     */
    public function setPretataireSlug($pretataireSlug)
    {
        $this->pretataireSlug = $pretataireSlug;

        return $this;
    }

    /**
     * Get pretataireSlug
     *
     * @return string
     */
    public function getPretataireSlug()
    {
        return $this->pretataireSlug;
    }

    public function __toString()
    {
        return $this->getPretataireSlug();
    }
}
