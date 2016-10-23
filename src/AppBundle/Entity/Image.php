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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\CategorieDeService",mappedBy="image")
     */
    private $categorie_service;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Internaute",mappedBy="image")
     */
    private $internaute;

    /**
     *@ORM\ManyToOne(targetEntity="Prestataire",inversedBy="image")
     */
    private $prestataire;


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
     * Set categorieService
     *
     * @param \AppBundle\Entity\CategorieDeService $categorieService
     *
     * @return Image
     */
    public function setCategorieService(\AppBundle\Entity\CategorieDeService $categorieService = null)
    {
        $this->categorie_service = $categorieService;

        return $this;
    }

    /**
     * Get categorieService
     *
     * @return \AppBundle\Entity\CategorieDeService
     */
    public function getCategorieService()
    {
        return $this->categorie_service;
    }

    /**
     * Set internaute
     *
     * @param \AppBundle\Entity\Internaute $internaute
     *
     * @return Image
     */
    public function setInternaute(\AppBundle\Entity\Internaute $internaute = null)
    {
        $this->internaute = $internaute;

        return $this;
    }

    /**
     * Get internaute
     *
     * @return \AppBundle\Entity\Internaute
     */
    public function getInternaute()
    {
        return $this->internaute;
    }

    /**
     * Set prestataire
     *
     * @param \AppBundle\Entity\Prestataire $prestataire
     *
     * @return Image
     */
    public function setPrestataire(\AppBundle\Entity\Prestataire $prestataire = null)
    {
        $this->prestataire = $prestataire;

        return $this;
    }

    /**
     * Get prestataire
     *
     * @return \AppBundle\Entity\Prestataire
     */
    public function getPrestataire()
    {
        return $this->prestataire;
    }
}
