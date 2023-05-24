<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscriptions
 *
 * @ORM\Table(name="inscriptions", indexes={@ORM\Index(name="fk_inscriptions_tirage", columns={"tirage_id"})})
 * @ORM\Entity
 */
class Inscriptions
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
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscription", type="datetime", nullable=false)
     */
    private $dateInscription;

    /**
     * @var \Tirages
     *
     * @ORM\ManyToOne(targetEntity="Tirages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tirage_id", referencedColumnName="id")
     * })
     */
    private $tirage;


}
