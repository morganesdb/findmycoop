<?php

namespace Admin\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Admin\Form\CategoryForm;
use Admin\Form\EventForm;

class EventController extends AbstractActionController {

    public function indexAction() {
        $entityManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

        if ($this->getRequest()->isPost()) {
            $dataForm = $this->getRequest()->getPost();
            $set = $entityManager->getRepository('Forum\Entity\Event')->find($dataForm['id_event']);
            $d = $dataForm['date'] . " " . $dataForm['time'];
            $set->setContenuEvent($dataForm['contenu']);
            $set->setNomEvent($dataForm['name']);
            $set->setDateEvent(new \DateTime($d));
            $entityManager->persist($set);
            $entityManager->flush();
        }
        return new ViewModel(array(
            'event' => $entityManager->getRepository('Forum\Entity\Event')->findAll(),
        ));
    }

    public function addAction() {
        $entityManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        if ($this->getRequest()->isPost()) {
            $event = new \Forum\Entity\Event();
            $dataForm = $this->getRequest()->getPost();
            $d = $dataForm['date'] . " " . $dataForm['time'];
            $date = $date->format('Y-m-d H:i:s');
            $event->setContenuEvent($dataForm['contenu']);
            $event->setNomEvent($dataForm['name']);
            $event->setDateEvent(new \DateTime($d));
            $entityManager->persist($event);
            $entityManager->flush();
        }
        
        $post =  new \Forum\Entity\Event();
        $form = new EventForm($entityManager, $post);
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }

    public function deleteAction($id) {
        $em = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        $id = (int) $this->params()->fromRoute('id', 0);
        $post = $em->getRepository('\Forum\Entity\Event')->find($id);
        $em->remove($post);
        $em->flush();
    }

    public function editAction() {

        $entityManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');



        $id = (int) $this->params()->fromRoute('id', 0);
        $post = $entityManager->getRepository('\Forum\Entity\Event')->find($id);
        $form = new EventForm($entityManager, $post);
        $viewData['event'] = $post;
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }

}
