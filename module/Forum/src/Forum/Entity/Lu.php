<?php

namespace Forum\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lu
 *
 * @ORM\Table(name="Lu")
 * @ORM\Entity
 */
class Lu
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_Membre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idMembre;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_Projet", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idProjet;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Lu", type="boolean", nullable=false)
     */
    private $lu;


}

