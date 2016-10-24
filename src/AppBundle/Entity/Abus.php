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
     * @ORM\JoinColumn(name="commentaire_id",referencedColumnName="id",nullable=false)
     *
     */
    private $commentaires;

    /**
     *@ORM\ManyToOne(targetEntity="Internaute",inversedBy="abus")
     * @ORM\JoinColumn(name="internaute_id",referencedColumnName="id")
     */
    private $internautes;


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
     * Set commentaires
     *
     * @param \AppBundle\Entity\Commentaire $commentaires
     *
     * @return Abus
     */
    public function setCommentaires(\AppBundle\Entity\Commentaire $commentaires)
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    /**
     * Get commentaires
     *
     * @return \AppBundle\Entity\Commentaire
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Set internautes
     *
     * @param \AppBundle\Entity\Internaute $internautes
     *
     * @return Abus
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

    public function __construct()
    {
        $this->dateEncodage = new \DateTime();
    }
}
