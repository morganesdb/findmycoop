<?php
    namespace Admin\Form;
    use Zend\Form\Form;
    use Zend\Form\Element;
    
    
    
    // Notre class CategoryForm étend l'élément \Zend\Form\Form; 
    class EventForm extends Form
    {
        public function __construct($em, $post)
        {   
          
            parent::__construct('Event');
      
            $this->setAttribute('method', 'post');
            $this->add(array(
                'name' => 'id_event', // Nom du champ
                'type' => 'Hidden', 
                'attributes' => array(
                    'id'    => 'id_event',   // Id du champ
                    'value' => $post->getIdEvent(),
                    
                ),// Type du champ
            ));
            
            // Le champs name, de type Text
            $this->add(array(
                'name' => 'name',       // Nom du champ
                'type' => 'Text',       // Type du champ
                'attributes' => array(
                    'id'    => 'name',   // Id du champ
                    'value' => $post->getNomEvent(),
                    
                ),
                'options' => array(
                    'label' => 'Nom',   // Label à l'élément
                ),
            ));
            $this->add(array(
                'name' => 'contenu',       // Nom du champ
                'type' => 'Text',       // Type du champ
                'attributes' => array(
                    'id'    => 'contenu',
                    'value' => $post->getContenuEvent(),// Id du champ
                ),
                'options' => array(
                    'label' => 'Descriptif',   // Label à l'élément
                ),
            ));
            if ($post->getIdEvent()){
                $Date=$post->getDateEvent();
            }
            else {
                $Date="";
                
            }
            $this->add(array(
                'name' => 'date',       // Nom du champ
                'type' => 'date',       // Type du champ
                'attributes' => array(
                    'id'    => 'date',
                    'class' => 'date',
              
                    'value' =>  $Date,
                    // Id du champ
                ),
                'options' => array(
                    'label' => 'Date',   // Label à l'élément
                ),
            ));
            $this->add(array(
                'name' => 'time',       // Nom du champ
                'type' => 'time',       // Type du champ
                'attributes' => array(
                    'id'    => 'time',
                    'class' => 'time', 
                    'value' =>  $Date,
                ),
                'options' => array(
                    'label' => 'Heure',   // Label à l'élément
                ),
            ));


            // Le bouton Submit
            $this->add(array(
                'name' => 'submit',        // Nom du champ
                'type' => 'Submit',        // Type du champ
                'attributes' => array(     // On va définir quelques attributs
                    'value' => 'Ajouter',  // comme la valeur
                    'id' => 'submit',      // et l'id
                ),
            ));
        }
    }