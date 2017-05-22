<?php

namespace User\Controller;

use User\Form\UserForm;
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

    public function settingAction() {
        $entityManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
       
        $set = $entityManager->getRepository('Forum\Entity\Membre')->find($_SESSION['id']);
        $viewData['set'] = $set;
        
         if ($this->getRequest()->isPost()) {
             $dataForm = $this->getRequest()->getPost();
         
             $member = $set;
             
             $member ->setNom($dataForm['name']);
             $member -> setPrenom($dataForm['prenom']);
             $member -> setPseudo($dataForm['pseudo']);
             $member -> setAdresse($dataForm['adresse']);
             $member -> setEmail($dataForm['email']);
             $ville = $entityManager->getRepository('Forum\Entity\Ville')->find($dataForm['ville']);
             $member -> setCodePostal($ville);

             $entityManager->persist($member);
             $entityManager->flush();
         }
         
        $form = new UserForm($entityManager, $set);
        $viewData['form'] = $form;
        return new ViewModel($viewData);
//        $request = $this->getRequest();
//         if ($this->getRequest()->isPost()) {
//            if ($form->isValid($request->getPost())) {
//                    $request=setIdMembre();
//            }
//        }
    }
    
}