<?php
    namespace Admin\Form;
    use Zend\Form\Form;
    
    
    // Notre class CategoryForm étend l'élément \Zend\Form\Form; 
    class CategoryForm extends Form
    {
        public function __construct($entityManager,$cat)
        {   
          if($cat -> getIdParent()){
              $t = $cat -> getIdParent() -> getNomCat();
          }else{
              $t = null;
          }
            parent::__construct('Category');
      
            $this->setAttribute('method', 'post');
            $this->add(array(
                'name' => 'idcat', // Nom du champ
                'type' => 'Hidden',      // Type du champ
               
                'attributes' => array(
                    'id'    => 'idcat',   // Id du champ
                    'value' => $cat -> getIdCat(),
                ),
               
            ));
            
            // Le champs name, de type Text
            $this->add(array(
                'name' => 'name',       // Nom du champ
                'type' => 'Text',       // Type du champ
                'attributes' => array(
                    'id'    => 'name',   // Id du champ
                    'value' => $cat -> getNomCat(),
                ),
                'options' => array(
                    'label' => 'Nom',   // Label à l'élément
                ),
            ));
           
            $this->add(array(
                'type' => 'DoctrineModule\Form\Element\ObjectSelect',
                'name' => 'parent',
                'options' => array(
                    'label' => 'Catégorie Parent',
                    'object_manager' => $entityManager,
                    'target_class' => 'Forum\Entity\Categorie',
                    'property' => 'nomCat',
                    'value' => $t,
                 )
            ));
                    if($cat->getNomCat()) {
            $value = Modifier;
        } else {
            $value=Ajouter;
        }
            // Le bouton Submit
            $this->add(array(
                'name' => 'submit',        // Nom du champ
                'type' => 'Submit',        // Type du champ
                'attributes' => array(     // On va définir quelques attributs
                    'value' => $value,  // comme la valeur
                    'id' => 'submit',      // et l'id
                ),
            ));
        }
    }