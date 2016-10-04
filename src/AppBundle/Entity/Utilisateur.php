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
     * @ORM\Column(name="motDePasse", type="string", length=255)
     */
    private $motDePasse;

    /**
     * @var string
     *
     * @ORM\Column(name="rueNumero", type="string", length=255)
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
     * @ORM\Column(name="inscription", type="date", length=255)
     */
    private $inscription;

    /**
     * @var string
     *
     * @ORM\Column(name="typeUtilisateur", type="string", length=255)
     */
    private $typeUtilisateur;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreEssai", type="integer")
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
     * @ORM\Column(name="inscriptionConf", type="boolean")
     */
    private $inscriptionConf;

    /**
     * @ORM\ManyToOne(targetEntity="CodePostal",inversedBy="utilisateurs")
     */
    private $codePostals;

    /**
     * @ORM\ManyToOne(targetEntity="Localite",inversedBy="utilisateur")
     */
    private $localites;

    /**
     * @ORM\ManyToOne(targetEntity="Commune",inversedBy="utilisateurs")
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
     * Get id
     *
     * @return int
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
     * Set inscription
     *
     * @param \DateTime $date
     *
     * @return Utilisateur
     */
    public function setInscription($inscription)
    {
        $this->inscription = $inscription;

        return $this;
    }

    /**
     * Get inscription
     *
     * @return \DateTime
     */
    public function getInscription()
    {
        return $this->inscription;
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
     * @return int
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
     * @return bool
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
     * @return bool
     */
    public function getInscriptionConf()
    {
        return $this->inscriptionConf;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->internautes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->prestataires = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set codePostals
     *
     * @param \AppBundle\Entity\CodePostal $codePostals
     *
     * @return Utilisateur
     */
    public function setCodePostals(\AppBundle\Entity\CodePostal $codePostals = null)
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
    public function setLocalites(\AppBundle\Entity\Localite $localites = null)
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
    public function setCommunes(\AppBundle\Entity\Commune $communes = null)
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
}
