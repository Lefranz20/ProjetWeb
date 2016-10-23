<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abus
 *
 * @ORM\Table(name="abus")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AbusRepository")
 */
class Abus
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
     * @var text
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_encodage", type="datetime")
     */
    private $dateEncodage;

    /**
     *@ORM\ManyToOne(targetEntity="Commentaire",inversedBy="abus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commentaire;

    /**
     *@ORM\ManyToOne(targetEntity="Internaute",inversedBy="abus")
     */
    private $internaute;



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
     * Set description
     *
     * @param string $description
     *
     * @return Abus
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateEncodage
     *
     * @param \DateTime $dateEncodage
     *
     * @return Abus
     */
    public function setDateEncodage($dateEncodage)
    {
        $this->dateEncodage = $dateEncodage;

        return $this;
    }

    /**
     * Get dateEncodage
     *
     * @return \DateTime
     */
    public function getDateEncodage()
    {
        return $this->dateEncodage;
    }

    /**
     * Set commentaire
     *
     * @param \AppBundle\Entity\Commentaire $commentaire
     *
     * @return Abus
     */
    public function setCommentaire(\AppBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return \AppBundle\Entity\Commentaire
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set internaute
     *
     * @param \AppBundle\Entity\Internaute $internaute
     *
     * @return Abus
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
}
