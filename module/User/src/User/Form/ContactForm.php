<?php
    namespace User\Form;
    use Zend\Form\Form;
    
    class ContactForm extends Form
    {
        public function __construct($entityManager, $dest)
        {   
          
            parent::__construct('Contact');
      
            $this->setAttribute('method', 'post');
            $this->add(array(
                'name' => 'id', // Nom du champ
                'type' => 'Hidden',      // Type du champ
            ));
            if($dest -> getIdExp()){
                $t = $dest -> getIdExp() -> getNom();
            }
            else {
                $t = null;
            }
            // Le champs name, de type Text
            $this->add(array(
                'name' => 'dest',       // Nom du champ
                'type' => 'Text',       // Type du champ
                'attributes' => array(
                    'id'    => 'dest',   // Id du champ
                    'value'=> $t,
                ),
                'options' => array(
                    'label' => 'Destinataire :',   // Label à l'élément
                ),
            ));
             $this->add(array(
                'name' => 'sujet',       // Nom du champ
                'type' => 'Text',       // Type du champ
                'attributes' => array(
                    'id'    => 'sujet',   // Id du champ
                    'value' => $dest -> getSujetMess(),
                ),
                'options' => array(
                    'label' => 'Sujet :',   // Label à l'élément
                ),
            ));

             $this->add(array(
           'name' => 'text',
           'attributes'=>array(
               'type'=>'textarea'
           ),
           'options' => array(
               'label' => 'Message : ',
           ),
       ));
            
        
        
            
            // Le bouton Submit
            $this->add(array(
                'name' => 'submit',        // Nom du champ
                'type' => 'Submit',        // Type du champ
                'attributes' => array(     // On va définir quelques attributs
                    'value' => 'S\'enregistrer',  // comme la valeur
                    'id' => 'submit',      // et l'id
                ),
            ));
        }
    }
