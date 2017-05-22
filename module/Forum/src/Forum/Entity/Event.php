<?php

namespace Forum\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="BEZIERS_Event_FMC")
 * @ORM\Entity
 */
class Event {

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_Event", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Event", type="string", length=50, nullable=false)
     */
    private $nomEvent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Event", type="datetime", nullable=false)
     */
    private $dateEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="Contenu_Event", type="text", length=65535, nullable=false)
     */
    private $contenuEvent;

    function getIdEvent() {
        return $this->idEvent;
    }

    function getNomEvent() {
        return $this->nomEvent;
        }

    function getDateEvent(): \DateTime {
        return $this->dateEvent;
    }

    function getContenuEvent() {
        return $this->contenuEvent;
    }

    function setIdEvent($idEvent) {
        $this->idEvent = $idEvent;
    }

    function setNomEvent($nomEvent) {
        $this->nomEvent = $nomEvent;
    }

    function setDateEvent(\DateTime $dateEvent) {
        $this->dateEvent = $dateEvent;
    }

    function setContenuEvent($contenuEvent) {
        $this->contenuEvent = $contenuEvent;
    }

}
