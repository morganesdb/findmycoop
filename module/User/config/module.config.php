<?php
return array(
    'router' => array(
    'routes' => array(
              'membre' => array(
                'type'    => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/membre',
                    'defaults' => array(
                        'controller'    => 'User/Controller/Membre',
                        'action'        => 'membre',
                    ),
                ),
            ),
                    'detail' => array(
                'type'    => 'segment',
                'options' => array(
                'route'    => '/membre/detail[/:id]',
                'constraints' => array(
                         'id'     => '[0-9]+',
                    
                     ),
                     'defaults' => array(
                        'controller'    => 'User/Controller/Membre',
                        'action'        => 'detail',
                    ),
                      ),
    ),
         'user' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/membre/setting[/:id]',
                'constraints' => array(
                         'id'     => '[0-9]+',                   
                     ),                    
                    'defaults' => array(
                        'controller' => 'User\Controller\Membre',
                        'action'     => 'setting',                       
                      
                    ),
                ),
            ),
            'connect' => array(
                    'type'    => 'Zend\Mvc\Router\Http\Literal',
                    'options' => array(
                        'route'    => '/connect',
                        'defaults' => array(
                            'controller'    => 'User/Controller/Log',
                            'action'        => 'connect',
                    ),
                ),
            ),
         'creation' => array(
                    'type'    => 'Zend\Mvc\Router\Http\Literal',
                    'options' => array(
                        'route'    => '/creation',
                        'defaults' => array(
                            'controller'    => 'User/Controller/Log',
                            'action'        => 'creation',
                    ),
                ),
            ),
        'setting' => array(
                    'type'    => 'Zend\Mvc\Router\Http\Literal',
                    'options' => array(
                        'route'    => '/setting',
                        'defaults' => array(
                            'controller'    => 'User/Controller/Membre',
                            'action'        => 'setting',
                    ),
                ),
            ),
        'contact' => array(
                    'type'    => 'Zend\Mvc\Router\Http\Literal',
                    'options' => array(
                        'route'    => '/contact',
                        'defaults' => array(
                            'controller'    => 'User/Controller/Contact',
                            'action'        => 'contact',
                    ),
                ),
            ),
        'message' => array(
                    'type'    => 'Zend\Mvc\Router\Http\Literal',
                    'options' => array(
                        'route'    => '/message',
                        'defaults' => array(
                            'controller'    => 'User/Controller/Contact',
                            'action'        => 'afficher',
                    ),
                ),
            ),
        'detailm' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/message/detail[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
//                        '__NAMESPACE__' => 'Forum\Controller',
                        'controller' => 'User/Controller/Contact',
                        'action' => 'detail',
                    ),
                ),
            ),
        )
    ),
       
    

       'controllers' => array(
        'invokables' => array(
            'User\Controller\Membre' => 'User\Controller\MembreController',
	    'User\Controller\Log' => 'User\Controller\LogController',
            'User\Controller\Contact' => 'User\Controller\ContactController',
        ),
     
    ),
      'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../../Forum/view/layout/layout.phtml',
            'user/membre/membre' => __DIR__ . '/../view/user/membre/membre.phtml',
            'user/contact/contact' => __DIR__ . '/../view/user/membre/contact.phtml',
            'user/log/connect' => __DIR__ . '/../view/log/connect.phtml',
            'user/contact/afficher' => __DIR__ . '/../view/user/membre/message.phtml',
            'user/log/creation' => __DIR__ . '/../view/log/creation.phtml',
            'user/contact/detail' =>  __DIR__ . '/../view/user/membre/repmess.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
