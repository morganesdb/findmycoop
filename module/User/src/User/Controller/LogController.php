<?php

namespace User\Controller;

use User\Form\LogForm;
use User\Form\CreationForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LogController extends AbstractActionController {

    public function connectAction() {
        $entityManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        if ($_SESSION) {
            unset($_SESSION);
            session_destroy();
            header('Location: /');
            exit;
        } elseif ($this->getRequest()->isPost()) {
            $dataForm = $this->getRequest()->getPost();

            $request = $entityManager->getRepository('Forum\Entity\Membre')
                    ->findOneBy(array('email' => $dataForm['email'], 'password' 
                        => $dataForm['password']));
            if ($request) {
                unset($_SESSION);
                session_destroy();
                session_start();
                $_SESSION['id'] = $request->getIdMembre();
                $_SESSION['nom'] = $request->getNom();
                $_SESSION['prenom'] = $request->getPrenom();
                $_SESSION['pseudo'] = $request->getPseudo();
                if ($request->getAdmin() == 1) {
                    $_SESSION['admin'] = $request->getAdmin();
                }
                header('Location: /');
                exit;
            }
        }

        $form = new LogForm($entityManager);
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }

    public function creationAction() {
        $entityManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

        if ($this->getRequest()->isPost()) {
            $dataForm = $this->getRequest()->getPost();

            $member = new \Forum\Entity\Membre();

            $member->setPseudo($dataForm['pseudo']);
            $member->setPassword($dataForm['password']);
         
            $member->setEmail($dataForm['email']);
           
            $member->setAdmin(0);

            $entityManager->persist($member);
            $entityManager->flush();
            header('Location: /');
            exit;
        }
        $form = new CreationForm($entityManager);
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }

}
