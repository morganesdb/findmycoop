<?php

namespace Forum\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="BEZIERS_Message_FMC")
 * @ORM\Entity
 */
class Message
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_Mess", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMess;

    /**
     * @var string
     *
     * @ORM\Column(name="Sujet_Mess", type="string", length=50, nullable=false)
     */
    private $sujetMess;

    /**
     * @var string
     *
     * @ORM\Column(name="Texte_Mess", type="text", length=65535, nullable=false)
     */
    private $texteMess;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Mess", type="date", nullable=false)
     */
    private $dateMess;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Membre")
     * @ORM\JoinColumn(name="ID_Exp", referencedColumnName="ID_Membre")
     */
    private $idExp;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Membre")
     * @ORM\JoinColumn(name="ID_Dest", referencedColumnName="ID_Membre")
     */
    private $idDest;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Lu", type="boolean", nullable=true)
     */
    private $lu;

    function getIdMess() {
        return $this->idMess;
    }

    function getSujetMess() {
        return $this->sujetMess;
    }

    function getTexteMess() {
        return $this->texteMess;
    }

    function getDateMess(): \DateTime {
        return $this->dateMess;
    }

    function getIdExp() {
        return $this->idExp;
    }

    function getIdDest() {
        return $this->idDest;
    }

    function getDescription() {
        return $this->description;
    }

    function getLu() {
        return $this->lu;
    }

    function setIdMess($idMess) {
        $this->idMess = $idMess;
    }

    function setSujetMess($sujetMess) {
        $this->sujetMess = $sujetMess;
    }

    function setTexteMess($texteMess) {
        $this->texteMess = $texteMess;
    }

    function setDateMess(\DateTime $dateMess) {
        $this->dateMess = $dateMess;
    }

    function setIdExp($idExp) {
        $this->idExp = $idExp;
    }

    function setIdDest($idDest) {
        $this->idDest = $idDest;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setLu($lu) {
        $this->lu = $lu;
    }


}

