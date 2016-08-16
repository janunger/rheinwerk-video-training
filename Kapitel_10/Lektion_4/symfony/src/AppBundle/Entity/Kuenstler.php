<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Kuenstler
 *
 * @ORM\Table(name="kuenstler")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\KuenstlerRepository")
 */
class Kuenstler
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
     * @ORM\Column(name="name", type="string", length=32)
     */
    private $name;

    /**
     * @var Cd[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Cd", mappedBy="kuenstler")
     */
    private $cds;

    public function __construct()
    {
        $this->cds = new ArrayCollection();
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName() : string
    {
        return $this->name;
    }
}

