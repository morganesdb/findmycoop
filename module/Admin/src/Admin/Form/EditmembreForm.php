<?php

namespace Admin\Form;

use Zend\Form\Form;

// Notre class CategoryForm étend l'élément \Zend\Form\Form; 
class EditmembreForm extends Form {

    public function __construct($entityManager, $set) {

        parent::__construct('editmembre');

        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id_user', // Nom du champ
            'type' => 'Hidden',
            'attributes' => array(
                'id' => 'id_user', // Id du champ
                'value' => $set->getIdMembre(),
            ),
        ));
        $this->add(array(
            'name' => 'Name', // Nom du champ
            'type' => 'text', // Type du champ
            'attributes' => array(
                'id' => 'Name', // Id du champ
                'value' => $set->getNom(),
            ),
            'options' => array(
                'label' => 'Name', // Label à l'élément
            ),
        ));

        // Le champs name, de type Text
        $this->add(array(
            'name' => 'prenom', // Nom du champ
            'type' => 'Text', // Type du champ
            'attributes' => array(
                'id' => 'prenom', // Id du champ
                'value' => $set->getPrenom(),
            ),
            'options' => array(
                'label' => 'prenom', // Label à l'élément
            ),
        ));
        $this->add(array(
            'name' => 'pseudo', // Nom du champ
            'type' => 'Text', // Type du champ
            'attributes' => array(
                'id' => 'pseudo', // Id du champ
                'value' => $set->getPseudo(),
            ),
            'options' => array(
                'label' => 'pseudo', // Label à l'élément
            ),
        ));
        $this->add(array(
            'name' => 'password', // Nom du champ
            'type' => 'Text', // Type du champ
            'attributes' => array(
                'id' => 'password', // Id du champ
                'value' => $set->getPassword(),
            ),
            'options' => array(
                'label' => 'password', // Label à l'élément
            ),
        ));
        $this->add(array(
            'name' => 'adresse', // Nom du champ
            'type' => 'Text', // Type du champ
            'attributes' => array(
                'id' => 'adresse', // Id du champ
                'value' => $set->getAdresse(),
            ),
            'options' => array(
                'label' => 'adresse', // Label à l'élément
            ),
        ));
        $this->add(array(
            'name' => 'siteweb', // Nom du champ
            'type' => 'Text', // Type du champ
            'attributes' => array(
                'id' => 'siteweb', // Id du champ
                'value' => $set->getSiteweb(),
            ),
            'options' => array(
                'label' => 'siteweb', // Label à l'élément
            ),
        ));
        $this->add(array(
            'name' => 'Description', // Nom du champ
            'type' => 'text', // Type du champ
            'attributes' => array(
                'id' => 'Description', // Id du champ
                'value' => $set->getDescription(),
            ),
            'options' => array(
                'label' => 'Description', // Label à l'élément
            ),
        ));
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'ville',
            'options' => array(
                'label' => 'Ville',
                'object_manager' => $entityManager,
                'target_class' => 'Forum\Entity\Ville',
                'property' => 'nomVille',
            ),
        ));
        $this->add(array(
            'name' => 'email', // Nom du champ
            'type' => 'Text', // Type du champ
            'attributes' => array(
                'id' => 'email', // Id du champ
                'value' => $set->getEmail(),
            ),
            'options' => array(
                'label' => 'email', // Label à l'élément
            ),
        ));

        // Le bouton Submit
        $this->add(array(
            'name' => 'submit', // Nom du champ
            'type' => 'Submit', // Type du champ
            'attributes' => array(// On va définir quelques attributs
                'value' => 'Modifier', // comme la valeur
                'id' => 'submit', // et l'id
            ),
        ));
    }

}
