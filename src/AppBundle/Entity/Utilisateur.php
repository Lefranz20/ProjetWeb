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
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="mot_de_passe", type="string", length=255)
     */
    private $motDePasse;

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
     * @ORM\Column(name="nombre_essai", type="integer")
     */
    private $nombreEssai;

    /**
     * @var bool
     *
     * @ORM\Column(name="banni", type="boolean")
     */
    private $banni;

    /**
     * @var bool
     *
     * @ORM\Column(name="inscription_conf", type="boolean")
     */
    private $inscriptionConf;

    /**
     * @ORM\ManyToOne(targetEntity="CodePostal",inversedBy="utilisateurs")
     *@ORM\JoinColumn(name="code_postal_id",referencedColumnName="id",nullable=false)
     */
    private $codePostals;

    /**
     * @ORM\ManyToOne(targetEntity="Localite",inversedBy="utilisateurs")
     *@ORM\JoinColumn(name="localite_id",referencedColumnName="id",nullable=false)
     */
    private $localites;

    /**
     * @ORM\ManyToOne(targetEntity="Commune",inversedBy="utilisateurs")
     * @ORM\JoinColumn(name="commune_id",referencedColumnName="id",nullable=false)
     */
    private $communes;

    /**
     * @ORM\OneToMany(targetEntity="Internaute",mappedBy="utilisateurs")
     */
    private $internautes;

    /**
     * @ORM\OneToMany(targetEntity="Prestataire",mappedBy="utilisateurs")
     */
    private $prestataires;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->internautes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->prestataires = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set email
     *
     * @param string $email
     *
     * @return Utilisateur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set motDePasse
     *
     * @param string $motDePasse
     *
     * @return Utilisateur
     */
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    /**
     * Get motDePasse
     *
     * @return string
     */
    public function getMotDePasse()
    {
        return $this->motDePasse;
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
     * Set banni
     *
     * @param boolean $banni
     *
     * @return Utilisateur
     */
    public function setBanni($banni)
    {
        $this->banni = $banni;

        return $this;
    }

    /**
     * Get banni
     *
     * @return boolean
     */
    public function getBanni()
    {
        return $this->banni;
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
     * Set codePostals
     *
     * @param \AppBundle\Entity\CodePostal $codePostals
     *
     * @return Utilisateur
     */
    public function setCodePostals(\AppBundle\Entity\CodePostal $codePostals)
    {
        $this->codePostals = $codePostals;

        return $this;
    }

    /**
     * Get codePostals
     *
     * @return \AppBundle\Entity\CodePostal
     */
    public function getCodePostals()
    {
        return $this->codePostals;
    }

    /**
     * Set localites
     *
     * @param \AppBundle\Entity\Localite $localites
     *
     * @return Utilisateur
     */
    public function setLocalites(\AppBundle\Entity\Localite $localites)
    {
        $this->localites = $localites;

        return $this;
    }

    /**
     * Get localites
     *
     * @return \AppBundle\Entity\Localite
     */
    public function getLocalites()
    {
        return $this->localites;
    }

    /**
     * Set communes
     *
     * @param \AppBundle\Entity\Commune $communes
     *
     * @return Utilisateur
     */
    public function setCommunes(\AppBundle\Entity\Commune $communes)
    {
        $this->communes = $communes;

        return $this;
    }

    /**
     * Get communes
     *
     * @return \AppBundle\Entity\Commune
     */
    public function getCommunes()
    {
        return $this->communes;
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
