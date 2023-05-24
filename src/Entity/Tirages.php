<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tirages
 *
 * @ORM\Table(name="tirages", indexes={@ORM\Index(name="fk_tirages_gagnant", columns={"gagnant"})})
 * @ORM\Entity
 */
class Tirages
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="numbers", type="text", length=65535, nullable=false)
     */
    private $numbers;

    /**
     * @var \Inscriptions
     *
     * @ORM\ManyToOne(targetEntity="Inscriptions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="gagnant", referencedColumnName="id")
     * })
     */
    private $gagnant;

    public function getDateString(){
        return $this->date->format('Ymd');
    }

    public function getNumbers(){
        return $this->numbers;
    }


}
