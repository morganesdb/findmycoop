<?php

namespace Forum\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Forum\Form\CreatForm;
use Forum\Form\CreatrForm;

class BarController extends AbstractActionController {

    public function barAction() {
        $entityManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        if ($this->getRequest()->isPost()) {
            $projet = new \Forum\Entity\Forum();
            $dataForm = $this->getRequest()->getPost();
            $projet->setTexteF($dataForm['texte']);
            $projet->setTitreF($dataForm['titre']);

            if ($_SESSION) {
                $membre = $entityManager->getRepository('\Forum\Entity\Membre')->find($_SESSION['id']);
                $projet->setIdCreateur($membre);
            }
            $projet->setCategorie(1);
            $catP = $entityManager->getRepository('\Forum\Entity\Categorie')->find($dataForm['idparent']);
            $projet->setIdCat($catP);
            $idp = $entityManager->getRepository('\Forum\Entity\Forum')->find($dataForm['idp']);
            $projet->setIdParent($idp);

            $test = (date("Y-m-d") . ' ' . date("H:i"));

            $projet->setDateF(new \DateTime($test));

            $entityManager->persist($projet);
            $entityManager->flush();
        }
        $viewData['bar'] = $entityManager->getRepository('Forum\Entity\Categorie')->findAll();
        $viewData['forum'] = $entityManager->getRepository('Forum\Entity\Forum')->findBy(array('categorie' => '1', 'idParent' => NULL));

        return new ViewModel($viewData);
    }

    public function creatbAction() {
        $entityManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

        if ($this->getRequest()->isPost()) {
            $projet = new \Forum\Entity\Forum();
            $dataForm = $this->getRequest()->getPost();
            $projet->setTexteF($dataForm['texte']);
            $projet->setTitreF($dataForm['titre']);
            $catP = $entityManager->getRepository('\Forum\Entity\Categorie')->find($dataForm['idCat']);
            $projet->setIdCat($catP);
            $membre = $entityManager->getRepository('\Forum\Entity\Membre')->find($_SESSION['id']);
            $projet->setIdCreateur($membre);
            $projet->setCategorie(1);

            $test = (date("Y-m-d") . ' ' . date("H:i"));

            $projet->setDateF(new \DateTime($test));

            $entityManager->persist($projet);
            $entityManager->flush();
        }

        $form = new CreatForm($entityManager);
        $viewData['projet'] = $entityManager->getRepository('Forum\Entity\Categorie')->findBy(array('idParent' => null));
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }

    public function creatrAction() {
        $entityManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');



        $id = (int) $this->params()->fromRoute('id', 0);
        $set = $entityManager->getRepository('\Forum\Entity\Forum')->find($id);
        $form = new CreatrForm($entityManager, $set);
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }

    public function deletebrAction($id) {
        if ($_SESSION['admin']) {
            $em = $this
                    ->getServiceLocator()
                    ->get('Doctrine\ORM\EntityManager');
            $id = (int) $this->params()->fromRoute('id', 0);
            $post = $em->getRepository('\Forum\Entity\Forum')->find($id);
            $post1 = $em->getRepository('\Forum\Entity\Forum')->findBy(array('idParent' => $post->getIdForum()));
            foreach ($post1 as $projet) :
                $em->remove($projet);
            endforeach;
            $em->remove($post);
            $em->flush();
        }
    }

    public function deleteeventAction($id) {
        if ($_SESSION['admin']) {
            $em = $this
                    ->getServiceLocator()
                    ->get('Doctrine\ORM\EntityManager');
            $id = (int) $this->params()->fromRoute('id', 0);
            $post = $em->getRepository('\Forum\Entity\Forum')->find($id);
            $em->remove($post);
            $em->flush();
        }
    }

}
