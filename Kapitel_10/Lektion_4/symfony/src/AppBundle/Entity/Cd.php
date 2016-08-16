<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="cds")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CdRepository")
 */
class Cd
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
     * @var Kuenstler
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Kuenstler", inversedBy="cds")
     * @ORM\JoinColumn(name="kuenstler_id", referencedColumnName="id", nullable=false)
     */
    private $kuenstler;

    /**
     * @var Lied[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Lied", mappedBy="cd")
     */
    private $lieder;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="erscheinungsjahr", type="integer", nullable=true)
     */
    private $erscheinungsjahr;

    public function __construct(Kuenstler $kuenstler)
    {
        $this->kuenstler = $kuenstler;
        $this->lieder    = new ArrayCollection();
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getKuenstler() : Kuenstler
    {
        return $this->kuenstler;
    }

    /**
     * @return Lied[]|ArrayCollection
     */
    public function getLieder()
    {
        $lieder = $this->lieder->toArray();
        usort($lieder, function(Lied $a, Lied $b) {
            return $a->getTrack() <=> $b->getTrack();
        });

        return $lieder;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setErscheinungsjahr(int $erscheinungsjahr)
    {
        $this->erscheinungsjahr = $erscheinungsjahr;
    }

    /**
     * @return int|null
     */
    public function getErscheinungsjahr()
    {
        return $this->erscheinungsjahr;
    }
}

