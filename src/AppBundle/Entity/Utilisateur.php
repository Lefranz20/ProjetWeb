<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UtilisateurRepository")
 */
class Utilisateur
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
     * @ORM\Column(name="rue_numero", type="string", length=255)
     */
    private $rueNumero;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=255)
     */
    private $rue;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscription", type="datetime", length=255)
     */
    private $dateInscription;

    /**
     * @var string
     *
     * @ORM\Column(name="type_utilisateur", type="string", length=255)
     */
    private $typeUtilisateur;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_essai", type="integer",nullable=true)
     *
     */
    private $nombreEssai;


    /**
     * @var bool
     *
     * @ORM\Column(name="inscription_conf", type="boolean",nullable=true)
     *
     */
    private $inscriptionConf;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\ConnexionData",inversedBy="utilisateurs",cascade={"remove"})
     * @ORM\JoinColumn(name="connexion_data_id",referencedColumnName="id",nullable=false)
     */
    private $connexionDatas;

    /**
     * @ORM\ManyToOne(targetEntity="CodePostal",inversedBy="utilisateurs",cascade={"persist"})
     *@ORM\JoinColumn(name="code_postal_id",referencedColumnName="id",nullable=false)
     */
    private $codePostal;

    /**
     * @ORM\ManyToOne(targetEntity="Localite",inversedBy="utilisateurs",cascade={"persist"})
     *@ORM\JoinColumn(name="localite_id",referencedColumnName="id",nullable=false)
     */
    private $localite;

    /**
     * @ORM\ManyToOne(targetEntity="Commune",inversedBy="utilisateurs",cascade={"persist"})
     * @ORM\JoinColumn(name="commune_id",referencedColumnName="id",nullable=false)
     */
    private $commune;

    /**
     * @ORM\OneToMany(targetEntity="Internaute",mappedBy="utilisateur")
     */
    private $internautes;

    /**
     * @ORM\OneToMany(targetEntity="Prestataire",mappedBy="utilisateur")
     */
    private $prestataires;


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
     * Set rueNumero
     *
     * @param string $rueNumero
     *
     * @return Utilisateur
     */
    public function setRueNumero($rueNumero)
    {
        $this->rueNumero = $rueNumero;

        return $this;
    }

    /**
     * Get rueNumero
     *
     * @return string
     */
    public function getRueNumero()
    {
        return $this->rueNumero;
    }

    /**
     * Set rue
     *
     * @param string $rue
     *
     * @return Utilisateur
     */
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get rue
     *
     * @return string
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set dateInscription
     *
     * @param \DateTime $dateInscription
     *
     * @return Utilisateur
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
     * Set typeUtilisateur
     *
     * @param string $typeUtilisateur
     *
     * @return Utilisateur
     */
    public function setTypeUtilisateur($typeUtilisateur)
    {
        $this->typeUtilisateur = $typeUtilisateur;

        return $this;
    }

    /**
     * Get typeUtilisateur
     *
     * @return string
     */
    public function getTypeUtilisateur()
    {
        return $this->typeUtilisateur;
    }

    /**
     * Set nombreEssai
     *
     * @param integer $nombreEssai
     *
     * @return Utilisateur
     */
    public function setNombreEssai($nombreEssai)
    {
        $this->nombreEssai = $nombreEssai;

        return $this;
    }

    /**
     * Get nombreEssai
     *
     * @return integer
     */
    public function getNombreEssai()
    {
        return $this->nombreEssai;
    }

    /**
     * Set inscriptionConf
     *
     * @param boolean $inscriptionConf
     *
     * @return Utilisateur
     */
    public function setInscriptionConf($inscriptionConf)
    {
        $this->inscriptionConf = $inscriptionConf;

        return $this;
    }

    /**
     * Get inscriptionConf
     *
     * @return boolean
     */
    public function getInscriptionConf()
    {
        return $this->inscriptionConf;
    }

    /**
     * Set connexionDatas
     *
     * @param \AppBundle\Entity\ConnexionData $connexionDatas
     *
     * @return Utilisateur
     */
    public function setConnexionDatas(\AppBundle\Entity\ConnexionData $connexionDatas)
    {
        $this->connexionDatas = $connexionDatas;

        return $this;
    }

    /**
     * Get connexionDatas
     *
     * @return \AppBundle\Entity\ConnexionData
     */
    public function getConnexionDatas()
    {
        return $this->connexionDatas;
    }

    /**
     * Set codePostal
     *
     * @param \AppBundle\Entity\CodePostal $codePostal
     *
     * @return Utilisateur
     */
    public function setCodePostal(\AppBundle\Entity\CodePostal $codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return \AppBundle\Entity\CodePostal
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set localite
     *
     * @param \AppBundle\Entity\Localite $localite
     *
     * @return Utilisateur
     */
    public function setLocalite(\AppBundle\Entity\Localite $localite)
    {
        $this->localite = $localite;

        return $this;
    }

    /**
     * Get localite
     *
     * @return \AppBundle\Entity\Localite
     */
    public function getLocalite()
    {
        return $this->localite;
    }

    /**
     * Set commune
     *
     * @param \AppBundle\Entity\Commune $commune
     *
     * @return Utilisateur
     */
    public function setCommune(\AppBundle\Entity\Commune $commune)
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * Get commune
     *
     * @return \AppBundle\Entity\Commune
     */
    public function getCommune()
    {
        return $this->commune;
    }

    /**
     * Add internaute
     *
     * @param \AppBundle\Entity\Internaute $internaute
     *
     * @return Utilisateur
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

    /**
     * Add prestataire
     *
     * @param \AppBundle\Entity\Prestataire $prestataire
     *
     * @return Utilisateur
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

}
