<?php

namespace Forum;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Forum\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'projet' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/projet',
                    'defaults' => array(
//                        '__NAMESPACE__' => 'Forum\Controller',
                        'controller' => 'Forum/Controller/Projet',
                        'action' => 'projet',
                    ),
                ),
            ),
           'idcreat' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/idcreat[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
//                        '__NAMESPACE__' => 'Forum\Controller',
                        'controller' => 'Forum/Controller/Projet',
                        'action' => 'idcreat',
                    ),
                ),
            ),
            'bar' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/bar',
                    'defaults' => array(
//                        '__NAMESPACE__' => 'Forum\Controller',
                        'controller' => 'Forum/Controller/Bar',
                        'action' => 'bar',
                    ),
                ),
            ),
            'creatp' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/creatp',
                    'defaults' => array(
//                        '__NAMESPACE__' => 'Forum\Controller',
                        'controller' => 'Forum/Controller/Projet',
                        'action' => 'creatp',
                    ),
                ),
            ),
            'creatb' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/creatb',
                    'defaults' => array(
//                        '__NAMESPACE__' => 'Forum\Controller',
                        'controller' => 'Forum/Controller/Bar',
                        'action' => 'creatb',
                    ),
                ),
            ),
            'creatr' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/creatr[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
//                        '__NAMESPACE__' => 'Forum\Controller',
                        'controller' => 'Forum/Controller/Bar',
                        'action' => 'creatr',
                    ),
                ),
            ),
            'deleteevent' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/deleteevent[/:id]',
                    'constraints' => array('id' => '[0-9]+'),
                    'defaults' => array(
                        'controller' => 'Forum\Controller\Bar',
                        'action' => 'deleteevent',
                    ),
                ),
            ),
                        'deletepr' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/deletepr[/:id]',
                    'constraints' => array('id' => '[0-9]+'),
                    'defaults' => array(
                        'controller' => 'Forum\Controller\Projet',
                        'action' => 'deletepr',
                    ),
                ),
            ),  
            'deletep' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/deletep[/:id]',
                    'constraints' => array('id' => '[0-9]+'),
                    'defaults' => array(
                        'controller' => 'Forum\Controller\Projet',
                        'action' => 'deletep',
                    ),
                ),
            ), 
            'deletebr' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/deletebr[/:id]',
                    'constraints' => array('id' => '[0-9]+'),
                    'defaults' => array(
                        'controller' => 'Forum\Controller\Bar',
                        'action' => 'deletebr',
                    ),
                ),
            ),             
            'creatrp' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/creatrp[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
//                        '__NAMESPACE__' => 'Forum\Controller',
                        'controller' => 'Forum/Controller/Projet',
                        'action' => 'creatrp',
                    ),
                ),
            ),
            'event' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/event',
                    'defaults' => array(
//                        '__NAMESPACE__' => 'Forum\Controller',
                        'controller' => 'Forum/Controller/Event',
                        'action' => 'event',
                    ),
                ),
            ),
            'detailp' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/detailp[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
//                        '__NAMESPACE__' => 'Forum\Controller',
                        'controller' => 'Forum/Controller/DetailP',
                        'action' => 'detailp',
                    ),
                ),
            ),
            'detailb' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/detailb[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
//                        '__NAMESPACE__' => 'Forum\Controller',
                        'controller' => 'Forum/Controller/DetailB',
                        'action' => 'detailb',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ),
    ),
    // Doctrine config
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Forum\Controller\Index' => 'Forum\Controller\IndexController',
            'Forum\Controller\Projet' => 'Forum\Controller\ProjetController',
            'Forum\Controller\Bar' => 'Forum\Controller\BarController',
            'Forum\Controller\Event' => 'Forum\Controller\EventController',
            'Forum\Controller\DetailP' => 'Forum\Controller\DetailPController',
            'Forum\Controller\DetailB' => 'Forum\Controller\DetailBController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'forum/index/index' => __DIR__ . '/../view/forum/index/index.phtml',
            
            'forum/bar/creatb' => __DIR__ . '/../view/forum/bar/createb.phtml',
            'forum/projet/creatp' => __DIR__ . '/../view/forum/projet/createprojet.phtml',
            'forum/bar/creatr' => __DIR__ . '/../view/forum/bar/creatr.phtml',
            'forum/projet/creatrp' => __DIR__ . '/../view/forum/projet/creatrp.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
