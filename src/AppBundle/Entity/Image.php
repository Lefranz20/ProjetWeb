<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImagesRepository")
 */
class Image
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
     * @ORM\Column(name="type_image", type="string", length=255)
     */
    private $typeImage;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=255)
     */
    private $lien;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\CategorieDeService",mappedBy="images")
     */
    private $categorie_services;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Internaute",mappedBy="images")
     */
    private $internautes;

    /**
     *@ORM\ManyToOne(targetEntity="Prestataire",inversedBy="images")
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
     * Set typeImage
     *
     * @param string $typeImage
     *
     * @return Image
     */
    public function setTypeImage($typeImage)
    {
        $this->typeImage = $typeImage;

        return $this;
    }

    /**
     * Get typeImage
     *
     * @return string
     */
    public function getTypeImage()
    {
        return $this->typeImage;
    }

    /**
     * Set lien
     *
     * @param string $lien
     *
     * @return Image
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set categorieServices
     *
     * @param \AppBundle\Entity\CategorieDeService $categorieServices
     *
     * @return Image
     */
    public function setCategorieServices(\AppBundle\Entity\CategorieDeService $categorieServices = null)
    {
        $this->categorie_services = $categorieServices;

        return $this;
    }

    /**
     * Get categorieServices
     *
     * @return \AppBundle\Entity\CategorieDeService
     */
    public function getCategorieServices()
    {
        return $this->categorie_services;
    }

    /**
     * Set internautes
     *
     * @param \AppBundle\Entity\Internaute $internautes
     *
     * @return Image
     */
    public function setInternautes(\AppBundle\Entity\Internaute $internautes = null)
    {
        $this->internautes = $internautes;

        return $this;
    }

    /**
     * Get internautes
     *
     * @return \AppBundle\Entity\Internaute
     */
    public function getInternautes()
    {
        return $this->internautes;
    }

    /**
     * Set prestataires
     *
     * @param \AppBundle\Entity\Prestataire $prestataires
     *
     * @return Image
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

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Image
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }
}
