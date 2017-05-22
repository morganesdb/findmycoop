<?php  
namespace Forum\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
 
class DetailController extends AbstractActionController {

    
   public function detailAction() {
        $entityManager = $this
            ->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');
        $id = (int) $this->params()->fromRoute('id', 0);
        return new ViewModel(
                
                array(
            
             'detail' => $entityManager->getRepository('Forum\Entity\Membre')->find($id),
         ));
    }
 
    
}