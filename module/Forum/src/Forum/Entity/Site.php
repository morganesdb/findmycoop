<?php

namespace Forum\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site
 *
 * @ORM\Table(name="BEZIERS_Site_FMC")
 * @ORM\Entity
 */
class Site
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_Site", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSite;

    /**
     * @var string
     *
     * @ORM\Column(name="Sujet", type="string", length=15, nullable=false)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="Contenu", type="text", length=65535, nullable=false)
     */
    private $contenu;

    function getIdSite() {
        return $this->idSite;
    }

    function getSujet() {
        return $this->sujet;
    }

    function getContenu() {
        return $this->contenu;
    }

    function setIdSite($idSite) {
        $this->idSite = $idSite;
    }

    function setSujet($sujet) {
        $this->sujet = $sujet;
    }

    function setContenu($contenu) {
        $this->contenu = $contenu;
    }


}

