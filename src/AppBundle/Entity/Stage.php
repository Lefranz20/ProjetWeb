<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stage
 *
 * @ORM\Table(name="stage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StageRepository")
 */
class Stage
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
     * @ORM\Column(name="tarif", type="string", length=255)
     */
    private $tarif;

    /**
     * @var text
     *
     * @ORM\Column(name="infoComplementaire", type="text")
     */
    private $infoComplementaire;

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
     *@ORM\ManyToOne(targetEntity="Prestataire",inversedBy="stages")
     * @ORM\JoinColumn(name="prestataire_id",referencedColumnName="id",nullable=false)
     */
    private $prestataires;



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
     * @return Stage
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
     * @return Stage
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
     * Set tarif
     *
     * @param string $tarif
     *
     * @return Stage
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return string
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * Set infoComplementaire
     *
     * @param string $infoComplementaire
     *
     * @return Stage
     */
    public function setInfoComplementaire($infoComplementaire)
    {
        $this->infoComplementaire = $infoComplementaire;

        return $this;
    }

    /**
     * Get infoComplementaire
     *
     * @return string
     */
    public function getInfoComplementaire()
    {
        return $this->infoComplementaire;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Stage
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
     * @return Stage
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
     * @return Stage
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
     * @return Stage
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
     * Set prestataires
     *
     * @param \AppBundle\Entity\Prestataire $prestataires
     *
     * @return Stage
     */
    public function setPrestataires(\AppBundle\Entity\Prestataire $prestataires)
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
}
