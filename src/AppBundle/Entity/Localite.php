<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localite
 *
 * @ORM\Table(name="localite")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LocaliteRepository")
 */
class Localite
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
     * @ORM\Column(name="localite_nom", type="string", length=255)
     */
    private $localiteNom;

    /**
     * @ORM\OneToMany(targetEntity="Utilisateur",mappedBy="localite")
     */
    private $utilisateurs;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CodePostal",inversedBy="localites")
     */
    private $codePostal;

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
     * Add utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Localite
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
     * Set codePostal
     *
     * @param \AppBundle\Entity\CodePostal $codePostal
     *
     * @return Localite
     */
    public function setCodePostal(\AppBundle\Entity\CodePostal $codePostal = null)
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
     * Set localiteNom
     *
     * @param string $localiteNom
     *
     * @return Localite
     */
    public function setLocaliteNom($localiteNom)
    {
        $this->localiteNom = $localiteNom;

        return $this;
    }

    /**
     * Get localiteNom
     *
     * @return string
     */
    public function getLocaliteNom()
    {
        return $this->localiteNom;
    }

    public function __toString()
    {
        return $this->getLocaliteNom();
    }

}
