<?php
 
namespace Forum\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
 
class IndexController extends AbstractActionController {

    
   public function indexAction() {
       $entityManager = $this
            ->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');              
        
             $viewData['site'] = $entityManager->getRepository('Forum\Entity\Site')->findAll();
        
        
        if($_SESSION){
            $membre = $entityManager -> getRepository('Forum\Entity\Membre')->find($_SESSION['id']);
             $viewData['projets'] = $entityManager->getRepository('Forum\Entity\Forum')->findBy(array('idCreateur' => $membre,'categorie' => 0));
            
         
        }
        return new ViewModel($viewData);
    }
 
    
}
