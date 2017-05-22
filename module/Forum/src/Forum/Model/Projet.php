<?php
namespace Forum\Model;

class Projet
{
    public $idCategory;
    public $name;
    
    public function exchangeArray($data)
    {

        $this->idCategory = (isset($data['ID_Cat'])) ? $data['ID_Cat'] : null;
        $this->name = (isset($data['Nom_Cat'])) ? $data['Nom_Cat'] : null;
    }
}
