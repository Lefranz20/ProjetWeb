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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="encodage", type="date")
     */
    private $encodage;

    /**
     *@ORM\ManyToOne(targetEntity="Commentaire",inversedBy="abus")
     */
    private $commentaires;

    /**
     *@ORM\ManyToOne(targetEntity="Internaute",inversedBy="abus")
     */
    private $internautes;


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
     * Set encodage
     *
     * @param \DateTime $encodage
     *
     * @return Abus
     */
    public function setEncodage($encodage)
    {
        $this->encodage = $encodage;

        return $this;
    }

    /**
     * Get encodage
     *
     * @return \DateTime
     */
    public function getEncodage()
    {
        return $this->encodage;
    }

    /**
     * Set commentaires
     *
     * @param \AppBundle\Entity\Commentaire $commentaires
     *
     * @return Abus
     */
    public function setCommentaires(\AppBundle\Entity\Commentaire $commentaires = null)
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
}
