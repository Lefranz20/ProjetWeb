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
     * @var string
     *
     * @ORM\Column(name="infoComplementaire", type="text")
     */
    private $infoComplementaire;

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
     *@ORM\ManyToOne(targetEntity="Prestataire",inversedBy="stages")
     */
    private $prestataires;


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
     * Set debut
     *
     * @param \DateTime $debut
     *
     * @return Stage
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
     * @return Stage
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
     * @return Stage
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
     * @return Stage
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
     * @return Stage
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
}
