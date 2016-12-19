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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Province",inversedBy="codePostals")
     */
    private $province;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Localite",mappedBy="codePostal")
     */
    private $localites;

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



    /**
     * Add localite
     *
     * @param \AppBundle\Entity\Localite $localite
     *
     * @return CodePostal
     */
    public function addLocalite(\AppBundle\Entity\Localite $localite)
    {
        $this->localites[] = $localite;

        return $this;
    }

    /**
     * Remove localite
     *
     * @param \AppBundle\Entity\Localite $localite
     */
    public function removeLocalite(\AppBundle\Entity\Localite $localite)
    {
        $this->localites->removeElement($localite);
    }

    /**
     * Get localites
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLocalites()
    {
        return $this->localites;
    }

    /**
     * Set province
     *
     * @param \AppBundle\Entity\Province $province
     *
     * @return CodePostal
     */
    public function setProvince(\AppBundle\Entity\Province $province = null)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return \AppBundle\Entity\Province
     */
    public function getProvince()
    {
        return $this->province;
    }

    public function __toString()
    {
        return $this->getCp();
    }
}
