<?php

namespace Forum\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Collaborateur
 *
 * @ORM\Table(name="Collaborateur")
 * @ORM\Entity
 */
class Collaborateur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_Collaborateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idCollaborateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_Projet", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idProjet;


}

