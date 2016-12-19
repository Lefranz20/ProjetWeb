<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Province
 *
 * @ORM\Table(name="province")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProvinceRepository")
 */
class Province
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
     * @ORM\Column(name="province_nom", type="string", length=255)
     */
    private $provinceNom;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CodePostal",mappedBy="province")
     */
    private $codePostals;


    /**
     * @ORM\OneToMany(targetEntity="Utilisateur",mappedBy="province")
     */
    private $utilisateurs;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codePostals = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add codePostal
     *
     * @param \AppBundle\Entity\CodePostal $codePostal
     *
     * @return Province
     */
    public function addCodePostal(\AppBundle\Entity\CodePostal $codePostal)
    {
        $this->codePostals[] = $codePostal;

        return $this;
    }

    /**
     * Remove codePostal
     *
     * @param \AppBundle\Entity\CodePostal $codePostal
     */
    public function removeCodePostal(\AppBundle\Entity\CodePostal $codePostal)
    {
        $this->codePostals->removeElement($codePostal);
    }

    /**
     * Get codePostals
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodePostals()
    {
        return $this->codePostals;
    }

    /**
     * Add utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Province
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
     * Set provinceNom
     *
     * @param string $provinceNom
     *
     * @return Province
     */
    public function setProvinceNom($provinceNom)
    {
        $this->provinceNom = $provinceNom;

        return $this;
    }

    /**
     * Get provinceNom
     *
     * @return string
     */
    public function getProvinceNom()
    {
        return $this->provinceNom;
    }

    public function __toString()
    {
        return $this->getProvinceNom();
    }


}
