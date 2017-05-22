<?php

namespace Forum\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Souscategorie
 *
 * @ORM\Table(name="SousCategorie")
 * @ORM\Entity
 */
class Souscategorie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_SCat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idScat;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_SCat", type="string", length=25, nullable=false)
     */
    private $nomScat;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_Cat", type="integer", nullable=false)
     */
    private $idCat;

    function getIdScat() {
        return $this->idScat;
    }

    function getNomScat() {
        return $this->nomScat;
    }

    function getIdCat() {
        return $this->idCat;
    }

    function setIdScat($idScat) {
        $this->idScat = $idScat;
    }

    function setNomScat($nomScat) {
        $this->nomScat = $nomScat;
    }

    function setIdCat($idCat) {
        $this->idCat = $idCat;
    }


}

