<?php

namespace Forum\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 *
 * @ORM\Table(name="Reponse")
 * @ORM\Entity
 */
class Reponse
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_Reponse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReponse;

    /**
     * @var string
     *
     * @ORM\Column(name="Texte_Rep", type="text", length=65535, nullable=false)
     */
    private $texteRep;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Rep", type="datetime", nullable=false)
     */
    private $dateRep;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_Membre", type="integer", nullable=false)
     */
    private $idMembre;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_Forum", type="integer", nullable=false)
     */
    private $idForum;


}

