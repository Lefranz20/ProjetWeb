<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentaireRepository")
 */
class Commentaire
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
     * @var int
     *
     * @ORM\Column(name="cote", type="integer")
     */
    private $cote;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var text
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_encodage", type="datetime")
     */
    private $dateEncodage;

    /**
     * @ORM\OneToMany(targetEntity="Abus",mappedBy="commentaire")
     */
    private $abus;

    /**
     *@ORM\ManyToOne(targetEntity="Internaute",inversedBy="commentaires")
     * @ORM\JoinColumn(name="internaute_id",referencedColumnName="id",nullable=false)
     */
    private $internaute;

    /**
     * @ORM\ManyToOne(targetEntity="Prestataire",inversedBy="commentaires")
     * @ORM\JoinColumn(name="prestataire_id",referencedColumnName="id",nullable=false)
     */
    private $prestataire;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->abus = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateEncodage = new \DateTime();
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
     * Set cote
     *
     * @param integer $cote
     *
     * @return Commentaire
     */
    public function setCote($cote)
    {
        $this->cote = $cote;

        return $this;
    }

    /**
     * Get cote
     *
     * @return integer
     */
    public function getCote()
    {
        return $this->cote;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Commentaire
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Commentaire
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set dateEncodage
     *
     * @param \DateTime $dateEncodage
     *
     * @return Commentaire
     */
    public function setDateEncodage($dateEncodage)
    {
        $this->dateEncodage = $dateEncodage;

        return $this;
    }

    /**
     * Get dateEncodage
     *
     * @return \DateTime
     */
    public function getDateEncodage()
    {
        return $this->dateEncodage;
    }

    /**
     * Add abus
     *
     * @param \AppBundle\Entity\Abus $abus
     *
     * @return Commentaire
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
     * Set internaute
     *
     * @param \AppBundle\Entity\Internaute $internaute
     *
     * @return Commentaire
     */
    public function setInternaute(\AppBundle\Entity\Internaute $internaute)
    {
        $this->internaute = $internaute;

        return $this;
    }

    /**
     * Get internaute
     *
     * @return \AppBundle\Entity\Internaute
     */
    public function getInternaute()
    {
        return $this->internaute;
    }

    /**
     * Set prestataire
     *
     * @param \AppBundle\Entity\Prestataire $prestataire
     *
     * @return Commentaire
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
}
