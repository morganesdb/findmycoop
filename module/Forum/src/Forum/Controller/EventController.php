<?php
 
namespace Forum\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
 
class EventController extends AbstractActionController {

    
   public function eventAction() {
        $entityManager = $this
            ->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');              
//        return new ViewModel(array(
//             'event' => $entityManager->getRepository('Forum\Entity\Event')->findAll(),
//         ));
//        return 
        return new JsonModel(array(
                'event' => $entityManager->getRepository('Forum\Entity\Event')->findBy(array(), array('dateEvent' => 'DESC')),
                'success' => true,
            ));

    }
}