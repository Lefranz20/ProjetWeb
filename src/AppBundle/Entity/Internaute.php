<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * Internaute
 *
 * @ORM\Table(name="internaute")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InternauteRepository")
 */
class Internaute
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
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @Gedmo\Slug(fields={"nom","prenom"})
     * @ORM\Column(length=128,unique=true)
     */
    private $internauteSlug;

    /**
     * @var bool
     *
     * @ORM\Column(name="inscription_newsletter", type="boolean")
     */
    private $inscriptionNewsletter;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscription", type="datetime", length=255)
     */
    private $dateInscription;

    /**
     * @ORM\OneToOne(targetEntity="Utilisateur",inversedBy="internautes")
     * @ORM\JoinColumn(name="utilisateur_id",referencedColumnName="id",nullable=false)
     *
     */
    private $utilisateurs;

    /**
     * @ORM\OneToMany(targetEntity="Abus",mappedBy="internaute")
     */
    private $abus;

    /**
     * @ORM\OneToMany(targetEntity="Commentaire",mappedBy="internaute")
     */
    private $commentaires;

    /**
     * @ORM\OneToOne(targetEntity="Image",mappedBy="internautes")
     *
     */
    private $images;

    /**
     * @ORM\ManyToMany(targetEntity="Prestataire",inversedBy="internaute")
     * @ORM\JoinColumn(nullable=true)
     * @ORM\JoinTable(name="favori")
     *
     */
    private $prestataire;

    /**
     * @ORM\OneToMany(targetEntity="Position",mappedBy="internaute")
     */
    private $positions;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Internaute
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Internaute
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set internauteSlug
     *
     * @param string $internauteSlug
     *
     * @return Internaute
     */
    public function setInternauteSlug($internauteSlug)
    {
        $this->internauteSlug = $internauteSlug;

        return $this;
    }

    /**
     * Get internauteSlug
     *
     * @return string
     */
    public function getInternauteSlug()
    {
        return $this->internauteSlug;
    }

    /**
     * Set inscriptionNewsletter
     *
     * @param boolean $inscriptionNewsletter
     *
     * @return Internaute
     */
    public function setInscriptionNewsletter($inscriptionNewsletter)
    {
        $this->inscriptionNewsletter = $inscriptionNewsletter;

        return $this;
    }

    /**
     * Get inscriptionNewsletter
     *
     * @return boolean
     */
    public function getInscriptionNewsletter()
    {
        return $this->inscriptionNewsletter;
    }

    /**
     * Set dateInscription
     *
     * @param \DateTime $dateInscription
     *
     * @return Internaute
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
     * Set utilisateurs
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateurs
     *
     * @return Internaute
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
     * Add abus
     *
     * @param \AppBundle\Entity\Abus $abus
     *
     * @return Internaute
     */
    public function addAbus(\AppBundle\Entity\Abus $abus)
    {
        $this->abus[] = $abus;

        return $this;
    }

    /**
     * Remove abus
     *
     * @param \AppBundle\Entity\Abus $abus
     */
    public function removeAbus(\AppBundle\Entity\Abus $abus)
    {
        $this->abus->removeElement($abus);
    }

    /**
     * Get abus
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAbus()
    {
        return $this->abus;
    }

    /**
     * Add commentaire
     *
     * @param \AppBundle\Entity\Commentaire $commentaire
     *
     * @return Internaute
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
     * Set images
     *
     * @param \AppBundle\Entity\Image $images
     *
     * @return Internaute
     */
    public function setImages(\AppBundle\Entity\Image $images = null)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Get images
     *
     * @return \AppBundle\Entity\Image
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Add prestataire
     *
     * @param \AppBundle\Entity\Prestataire $prestataire
     *
     * @return Internaute
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
     * Add position
     *
     * @param \AppBundle\Entity\Position $position
     *
     * @return Internaute
     */
    public function addPosition(\AppBundle\Entity\Position $position)
    {
        $this->positions[] = $position;

        return $this;
    }

    /**
     * Remove position
     *
     * @param \AppBundle\Entity\Position $position
     */
    public function removePosition(\AppBundle\Entity\Position $position)
    {
        $this->positions->removeElement($position);
    }

    /**
     * Get positions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPositions()
    {
        return $this->positions;
    }

    public function __toString()
    {
        return $this->getInternauteSlug();
    }
}
