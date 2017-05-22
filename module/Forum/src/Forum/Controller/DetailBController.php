<?php

namespace Forum\Controller;

use User\Form\UserForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class detailbController extends AbstractActionController {
        public function detailbAction() {
        $entityManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        $id = (int) $this->params()->fromRoute('id', 0);
        $set = $entityManager->getRepository('Forum\Entity\Forum')->find($id);
        $viewData['detailb'] = $set;
        $set = $entityManager->getRepository('Forum\Entity\Forum')->findBy(array('idParent'=>$set));
        $viewData['forumall'] = $set;

        return new ViewModel($viewData);
    }
}
