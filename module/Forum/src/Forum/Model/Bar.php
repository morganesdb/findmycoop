<?php
namespace Forum\Model;

class Bar
{
    public $idSCategory;
    public $nameS;
    
    public function exchangeArray($data)
    {

        $this->idSCategory = (isset($data['ID_SCat'])) ? $data['ID_SCat'] : null;
        $this->nameS = (isset($data['Nom_SCat'])) ? $data['Nom_SCat'] : null;
    }
}