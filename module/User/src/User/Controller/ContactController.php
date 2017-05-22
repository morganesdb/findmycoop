<?php

namespace User\Controller;

use User\Form\ContactForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController {

    public function contactAction() {
        $em = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

        if ($this->getRequest()->isPost()) {
            $mess = new \Forum\Entity\Message();
            $dataForm = $this->getRequest()->getPost();
            $mess->setSujetMess($dataForm['sujet']);
            $mess->setTexteMess($dataForm['text']);
            $heure = (date("Y-m-d") . ' ' . date("H:i"));
            $mess->setDateMess(new \DateTime($heure));
            $mess->setLu(0);
            if ($dataForm['dest'] == "admin") {
                $membre = $em->getRepository('Forum\Entity\Membre')
                        ->findOneBy(array('admin' => 1));
                $mess->setIdDest($membre);
            } else {
                $membre = $em->getRepository('Forum\Entity\Membre')
                        ->findOneBy(array('pseudo' => $dataForm['dest']));
                $mess->setIdDest($membre);
            }
            $membre = $em->getRepository('Forum\Entity\Membre')
                    ->find($_SESSION['id']);
            $mess->setIdExp($membre);

            $em->persist($mess);
            $em->flush();
        }
        $mess = new \Forum\Entity\Message();
        $form = new ContactForm($em, $mess);
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }

    public function afficherAction() {
        $em = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        $membre = $em->getRepository('Forum\Entity\Membre')
                ->find($_SESSION['id']);

        if (!empty($_POST)) {
            $mess = new \Forum\Entity\Message();
            $dataForm = $this->getRequest()->getPost();
            $mess->setSujetMess($dataForm['sujet']);
            $mess->setTexteMess($dataForm['text']);
            $test = (date("Y-m-d") . ' ' . date("H:i"));
            $mess->setDateMess(new \DateTime($test));
            $mess->setIdExp($membre);
            $dest = $em->getRepository('Forum\Entity\Membre')
                    ->findOneBy(array('nom' => $dataForm['dest']));

            $mess->setIdDest($dest);
            $em->persist($mess);
            $em->flush();
        }


        $viewData['mess'] = $em->getRepository('Forum\Entity\Message')->findBy(array('idDest' => $membre));
        return new ViewModel($viewData);
    }

    public function detailAction() {

        $em = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

        $id = (int) $this->params()->fromRoute('id', 0);
        $set = $em->getRepository('Forum\Entity\Message')->find($id);
        $viewData['mess'] = $set;

        $form = new ContactForm($em, $set);
        $viewData['form'] = $form;

        return new ViewModel($viewData);
    }

}
