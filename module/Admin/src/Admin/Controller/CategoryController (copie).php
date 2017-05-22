<?php

namespace Admin\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Admin\Form\CategoryForm;

class CategoryController extends AbstractActionController {

    public function indexAction() {
        $em = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

        if ($this->getRequest()->isPost()) {
            $dataForm = $this->getRequest()->getPost();
            $cat = $em->getRepository('Forum\Entity\Categorie')->find($dataForm['idcat']);


            $cat->setNomCat($dataForm['name']);

            $em->persist($cat);
            $em->flush();
        }
        $test = $dataForm;
        return new ViewModel(array(
            'category' => $em->getRepository('Forum\Entity\Categorie')->findAll(),
            'post' => $test,
        ));
    }

    public function addAction() {
        $em = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

        if ($this->getRequest()->isPost()) {
            $cat = new \Forum\Entity\Categorie();
            $dataForm = $this->getRequest()->getPost();
            print_r($dataForm);

            $catP = $em->getRepository('\Forum\Entity\Categorie')->find($dataForm['parent']);
            $cat->setIdParent($catP);
            $cat->setNomCat($dataForm['name']);
            $em->persist($cat);
            $em->flush();
            header('Location: /admin/category');
            exit;
        }
        $cat = new \Forum\Entity\Categorie();
        $form = new CategoryForm($em);
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }

    public function deleteAction() {
        $em = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        $id = (int) $this->params()->fromRoute('id', 0);
        $post = $em->getRepository('\Forum\Entity\Categorie')->find($id);
//        if (!$post) {
//            return $this->redirectToRoute('category');
//        }

        $em->remove($post);

        $em->flush();
    }

    public function editAction() {

        $em = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');



        $id = (int) $this->params()->fromRoute('id', 0);
        $post = $em->getRepository('\Forum\Entity\Categorie')->find($id);
        $form = new CategoryForm($em, $post);
        $viewData['cat'] = $post;
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }


}
