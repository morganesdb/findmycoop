<?php
    namespace User\Form;
    use Zend\Form\Form;
    
    
    // Notre class CategoryForm étend l'élément \Zend\Form\Form; 
    class LogForm extends Form
    {
        public function __construct($entityManager)
        {   
          
            parent::__construct('Log');
      
            $this->setAttribute('method', 'post');
            $this->add(array(
                'name' => 'id_membre', // Nom du champ
                'type' => 'Hidden',      // Type du champ
            ));
            
            // Le champs name, de type Text
            $this->add(array(
                'name' => 'email',       // Nom du champ
                'type' => 'Text',       // Type du champ
                'attributes' => array(
                    'id'    => 'email'   // Id du champ
                ),
                'options' => array(
                    'label' => 'email',   // Label à l'élément
                ),
            ));
                $this->add(array(
                'name' => 'password',       // Nom du champ
                'type' => 'Text',       // Type du champ
                'attributes' => array(
                    'id'    => 'password'   // Id du champ
                ),
                'options' => array(
                    'label' => 'password',   // Label à l'élément
                ),
            ));
        
        
            
            // Le bouton Submit
            $this->add(array(
                'name' => 'submit',        // Nom du champ
                'type' => 'Submit',        // Type du champ
                'attributes' => array(     // On va définir quelques attributs
                    'value' => 'Se connecter',  // comme la valeur
                    'id' => 'submit',      // et l'id
                ),
            ));
        }
    }
