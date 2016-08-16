<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lied
 *
 * @ORM\Table(name="lieder")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LiedRepository")
 */
class Lied
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
     * @var Cd
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cd", inversedBy="lieder")
     * @ORM\JoinColumn(name="cd_id", referencedColumnName="id", nullable=false)
     */
    private $cd;

    /**
     * @var int
     *
     * @ORM\Column(name="track", type="integer")
     */
    private $track;

    /**
     * @var string
     *
     * @ORM\Column(name="titel", type="string", length=64)
     */
    private $titel;

    public function __construct(Cd $cd)
    {
        $this->cd = $cd;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getCd(): Cd
    {
        return $this->cd;
    }

    public function setTrack(int $track)
    {
        $this->track = $track;
    }

    public function getTrack() : int
    {
        return $this->track;
    }

    public function setTitel(string $titel)
    {
        $this->titel = $titel;
    }

    public function getTitel() : string
    {
        return $this->titel;
    }
}

