<?php
namespace Forum\Model;

class Site
{
    public $ID_Site;
    public $Sujet;
    public $Contenu;
    
    public function exchangeArray($data)
    {
        $this->ID_Site = (isset($data['ID_Site'])) ? $data['ID_Site'] : null;
        $this->Sujet = (isset($data['Sujet'])) ? $data['Sujet'] : null;
        $this->Contenu = (isset($data['Contenu'])) ? $data['Contenu'] : null;
    }
}

