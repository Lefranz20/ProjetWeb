<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Position
 *
 * @ORM\Table(name="position")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PositionRepository")
 */
class Position
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
     * @var int
     *
     * @ORM\Column(name="ordre", type="integer")
     */
    private $ordre;

    /**
     *@ORM\ManyToOne(targetEntity="Bloc",inversedBy="positions")
     * @ORM\JoinColumn(name="bloc_id",referencedColumnName="id")
     */
    private $blocs;

    /**
     * @ORM\ManyToOne(targetEntity="Internaute",inversedBy="positions")
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
     * Set ordre
     *
     * @param integer $ordre
     *
     * @return Position
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return integer
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * Set blocs
     *
     * @param \AppBundle\Entity\Bloc $blocs
     *
     * @return Position
     */
    public function setBlocs(\AppBundle\Entity\Bloc $blocs = null)
    {
        $this->blocs = $blocs;

        return $this;
    }

    /**
     * Get blocs
     *
     * @return \AppBundle\Entity\Bloc
     */
    public function getBlocs()
    {
        return $this->blocs;
    }

    /**
     * Set internautes
     *
     * @param \AppBundle\Entity\Internaute $internautes
     *
     * @return Position
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
