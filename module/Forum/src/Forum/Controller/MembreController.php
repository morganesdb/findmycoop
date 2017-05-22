<?php
 
namespace Forum\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
 
class MembreController extends AbstractActionController {

    
   public function membreAction() {
        $entityManager = $this
            ->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');              
        return new ViewModel(array(
             'membre' => $entityManager->getRepository('Forum\Entity\Membre')->findAll(),
         ));
    }
}
