<?php

namespace Forum\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="BEZIERS_Categorie_FMC")
 * @ORM\Entity
 */
class Categorie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_Cat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCat;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Cat", type="string", length=30, nullable=false)
     */
    private $nomCat;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumn(name="ID_Parent", referencedColumnName="ID_Cat", nullable=true)
     */
    private $idParent;

    function getIdCat() {
        return $this->idCat;
    }

    function getNomCat() {
        return $this->nomCat;
    }

    function getIdParent() {
        return $this->idParent;
    }

    function setIdCat($idCat) {
        $this->idCat = $idCat;
    }

    function setNomCat($nomCat) {
        $this->nomCat = $nomCat;
    }

    function setIdParent($idParent) {
        $this->idParent = $idParent;
    }

    public function __toString() 
    {
        return $this->getNom();
    }

}

