<?php

namespace Forum\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class CreatForm extends Form {

    public function __construct($entityManager, $set) {

        parent::__construct('Event');

        $this->setAttribute('method', 'post');
        // Le champs name, de type Text

        $this->add(array(
            'name' => 'titre', // Nom du champ
            'type' => 'Text', // Type du champ
            'attributes' => array(
                'id' => 'titre'   // Id du champ
            ),
            'options' => array(
                'label' => 'Titre', // Label à l'élément
            ),
        ));
        $this->add(array(
            'name' => 'texte', // Nom du champ
            'type' => 'TextArea', // Type du champ
            'attributes' => array(
                'id' => 'texte'   // Id du champ
            ),
            'options' => array(
                'label' => 'Texte', // Label à l'élément
            ),
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'idCat',
            'options' => array(
                'label' => 'idCat',
                'object_manager' => $entityManager,
                'target_class' => 'Forum\Entity\Categorie',
                'property' => 'nomCat'
            )
        ));

        // Le bouton Submit
        $this->add(array(
            'name' => 'submit', // Nom du champ
            'type' => 'Submit', // Type du champ
            'attributes' => array(// On va définir quelques attributs
                'value' => 'Ajouter', // comme la valeur
                'id' => 'submit', // et l'id
            ),
        ));
    }

}
