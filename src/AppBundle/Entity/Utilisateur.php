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
     * @ORM\ManyToOne(targetEntity="CodePostal",inversedBy="utilisateur")
     *@ORM\JoinColumn(nullable=false)
     */
    private $codePostal;

    /**
     * @ORM\ManyToOne(targetEntity="Localite",inversedBy="utilisateur")
     *@ORM\JoinColumn(nullable=false)
     */
    private $localite;

    /**
     * @ORM\ManyToOne(targetEntity="Commune",inversedBy="utilisateur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commune;

    /**
     * @ORM\OneToMany(targetEntity="Internaute",mappedBy="utilisateur")
     */
    private $internaute;

    /**
     * @ORM\OneToMany(targetEntity="Prestataire",mappedBy="utilisateur")
     */
    private $prestataire;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->internaute = new \Doctrine\Common\Collections\ArrayCollection();
        $this->prestataire = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateInscription=new \DateTime();
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
     * Add prestataire
     *
     * @param \AppBundle\Entity\Prestataire $prestataire
     *
     * @return Utilisateur
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


}
