<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CodePostal
 *
 * @ORM\Table(name="code_postal")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CodePostalRepository")
 */
class CodePostal
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
     * @ORM\Column(name="cp", type="string", length=255, unique=true)
     */
    private $cp;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Commune",mappedBy="codePostal")
     */
    private $commune;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Localite",mappedBy="codePostal")
     */
    private $localite;

    /**
     * @ORM\OneToMany(targetEntity="Utilisateur",mappedBy="codePostal")
     *
     */
    private $utilisateurs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->utilisateurs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set cp
     *
     * @param string $cp
     *
     * @return CodePostal
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set commune
     *
     * @param \AppBundle\Entity\Commune $commune
     *
     * @return CodePostal
     */
    public function setCommune(\AppBundle\Entity\Commune $commune = null)
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
     * Set localite
     *
     * @param \AppBundle\Entity\Localite $localite
     *
     * @return CodePostal
     */
    public function setLocalite(\AppBundle\Entity\Localite $localite = null)
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
     * Add utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return CodePostal
     */
    public function addUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateurs[] = $utilisateur;

        return $this;
    }

    /**
     * Remove utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     */
    public function removeUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateurs->removeElement($utilisateur);
    }

    /**
     * Get utilisateurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }

    public function __toString()
    {
        return $this->getCp();
    }
}
