<?php

namespace Forum\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
/**
 * Membre
 *
 * @ORM\Table(name="BEZIERS_Membre_FMC")
 * @ORM\Entity
 */
class Membre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_Membre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMembre;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=50, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="Pseudo", type="string", length=50, nullable=false)
     */
    private $pseudo;
    
    /**
     * @var text
     *
     * @ORM\Column(name="Description", type="string", nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=50, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="SiteWeb", type="string", length=50, nullable=true)
     */
    private $siteweb;

    /**
     * @var integer
     *
     * @ORM\Column(name="Photo", type="integer", nullable=true)
     */
    private $photo;

    /**
     * @var integer
     *
     * @ORM\Column(name="Admin", type="integer", nullable=false)
     */
    private $admin;

    /**
    * @var integer $codePostal
    *
    * @ORM\ManyToOne(targetEntity="Ville")
    * @ORM\JoinColumn(name="Code_Postal", referencedColumnName="Code_Postal")
    */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=50, nullable=false)
     */
    private $email;

    function getIdMembre() {
        return $this->idMembre;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getPassword() {
        return $this->password;
    }
    function getDescription() {
        return $this->description;
    }

    function setDescription($description) {
        $this->description = $description;
    }

        function getAdresse() {
        return $this->adresse;
    }

    function getSiteweb() {
        return $this->siteweb;
    }

    function getPhoto() {
        return $this->photo;
    }

    function getAdmin() {
        return $this->admin;
    }

    function getCodePostal() {
        return $this->codePostal;
    }

    function getEmail() {
        return $this->email;
    }

    function setIdMembre($idMembre) {
        $this->idMembre = $idMembre;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setSiteweb($siteweb) {
        $this->siteweb = $siteweb;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    function setAdmin($admin) {
        $this->admin = $admin;
    }

    function setCodePostal($codePostal) {
        $this->codePostal = $codePostal;
    }

    function setEmail($email) {
        $this->email = $email;
    }


}
