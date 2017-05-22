<?php

namespace Admin\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Admin\Form\CategoryForm;
use Admin\Form\AddmembreForm;
use Admin\Form\EditmembreForm;

class MembreController extends AbstractActionController {

    public function indexAction() {
        $entityManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
              
        if ($this->getRequest()->isPost ()) {
            $dataForm = $this->getRequest()->getPost();
             
              $setp=$entityManager->getRepository('Forum\Entity\Membre')->find($dataForm['id_user']);
        
            $setp->setNom($dataForm['Name']);
            $setp->setPrenom($dataForm['prenom']);
            $setp->setPseudo($dataForm['pseudo']);
            $setp->setPassword($dataForm['password']);
            $setp->setAdresse($dataForm['adresse']);
            $setp->setSiteweb($dataForm['siteweb']);
            $ville = $entityManager->getRepository('Forum\Entity\Ville')->find($dataForm['ville']);
             $setp -> setCodePostal($ville);
            $setp->setDescription($dataForm['Description']);
            $setp->setEmail($dataForm['email']);
            

            $entityManager->persist($setp);
            $entityManager->flush();
        }
        
        return new ViewModel(array(
            'membre' => $entityManager->getRepository('Forum\Entity\Membre')->findAll(),
        ));

    }

    public function addmembreAction() {
        $entityManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        if ($this->getRequest()->isPost()) {
            $projet = new \Forum\Entity\Membre();
            $dataForm = $this->getRequest()->getPost();
            $projet->setNom($dataForm['Name']);
            $projet->setPrenom($dataForm['prenom']);
            $projet->setPseudo($dataForm['pseudo']);
            $projet->setPassword($dataForm['password']);
            $projet->setAdresse($dataForm['adresse']);
            $ville = $entityManager->getRepository('Forum\Entity\Ville')->find($dataForm['ville']);
             $projet -> setCodePostal($ville);
            $projet->setSiteweb($dataForm['siteweb']);
            $projet->setDescription($dataForm['Description']);
            $projet->setEmail($dataForm['email']);
            $projet->setAdmin(0);
            $projet->setDescription("");

            $entityManager->persist($projet);
            $entityManager->flush();
        }
        $form = new AddmembreForm($entityManager);
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }

    public function editmembreAction() {
        $entityManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');



        $id = (int) $this->params()->fromRoute('id', 0);
        $set = $entityManager->getRepository('Forum\Entity\Membre')->find($id);
        $viewData['set'] = $set;
        $dataForm = $this->getRequest()->getPost();




        $form = new EditmembreForm($entityManager, $set);
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }
        public function deletemembreAction() {
        $em = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        $id = (int) $this->params()->fromRoute('id', 0);
        $post = $em->getRepository('\Forum\Entity\Membre')->find($id);
//        if (!$post) {
//            return $this->redirectToRoute('category');
//        }

        $em->remove($post);

        $em->flush();
    }

//         public function addAction()
//    {
//            $entityManager = $this
//            ->getServiceLocator()
//            ->get('Doctrine\ORM\EntityManager');
//
//            if ($this->getRequest()->isPost()) {
//                $cat = new \Forum\Entity\Categorie();
//                $dataForm = $this->getRequest()->getPost();
//              
//               
//                $catP = $entityManager->getRepository('\Forum\Entity\Categorie')->find($dataForm['parent']);
//                $cat->setIdParent($catP);
//                $cat->setNomCat($dataForm['name']);
//                print_r($catP);
//                $entityManager->persist($cat);
//                $entityManager->flush();
//            }
//
//            $form = new CategoryForm($entityManager); 
//            $viewData['form'] = $form;
//                return new ViewModel($viewData);
//    
//    }
//     public function deleteAction($id)
//    {
//        $em = $this
//            ->getServiceLocator()
//            ->get('Doctrine\ORM\EntityManager');
//        $id = (int) $this->params()->fromRoute('id', 0);
//        $post = $em->getRepository('\Forum\Entity\Categorie')->find($id);
////        if (!$post) {
////            return $this->redirectToRoute('category');
////        }
//
//        $em -> remove($post);
//       
//        $em->flush();
//
//    }
}
