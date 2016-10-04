<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


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
     * @var bool
     *
     * @ORM\Column(name="newsletter", type="boolean")
     */
    private $newsletter;

    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur",inversedBy="internautes")
     * @ORM\JoinColumn(name="utilisateur_id",referencedColumnName="id")
     *
     */
    private $utilisateurs;

    /**
     * @ORM\OneToMany(targetEntity="Abus",mappedBy="internautes")
     */
    private $abus;

    /**
     * @ORM\OneToMany(targetEntity="Commentaire",mappedBy="internautes")
     */
    private $commentaires;

    /**
     *@ORM\OneToOne(targetEntity="Image",mappedBy="internautes")
     */
    private $images;

    /**
     * @ORM\ManyToMany(targetEntity="Prestataire",mappedBy="internautes")
     * @ORM\JoinTable(name="favori")
     *
     */
    private $prestataires;

    /**
     *@ORM\OneToMany(targetEntity="Position",mappedBy="internautes")
     */
    private $positions_internautes;


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
     * Set newsletter
     *
     * @param boolean $newsletter
     *
     * @return Internaute
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * Get newsletter
     *
     * @return bool
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * Set utilisateurs
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateurs
     *
     * @return Internaute
     */
    public function setUtilisateurs(\AppBundle\Entity\Utilisateur $utilisateurs = null)
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
     * Constructor
     */
    public function __construct()
    {
        $this->abus = new \Doctrine\Common\Collections\ArrayCollection();
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
        $this->prestataires[] = $prestataire;

        return $this;
    }

    /**
     * Remove prestataire
     *
     * @param \AppBundle\Entity\Prestataire $prestataire
     */
    public function removePrestataire(\AppBundle\Entity\Prestataire $prestataire)
    {
        $this->prestataires->removeElement($prestataire);
    }

    /**
     * Get prestataires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrestataires()
    {
        return $this->prestataires;
    }

    /**
     * Add positionsInternaute
     *
     * @param \AppBundle\Entity\Position $positionsInternaute
     *
     * @return Internaute
     */
    public function addPositionsInternaute(\AppBundle\Entity\Position $positionsInternaute)
    {
        $this->positions_internautes[] = $positionsInternaute;

        return $this;
    }

    /**
     * Remove positionsInternaute
     *
     * @param \AppBundle\Entity\Position $positionsInternaute
     */
    public function removePositionsInternaute(\AppBundle\Entity\Position $positionsInternaute)
    {
        $this->positions_internautes->removeElement($positionsInternaute);
    }

    /**
     * Get positionsInternautes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPositionsInternautes()
    {
        return $this->positions_internautes;
    }
}
