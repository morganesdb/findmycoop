<?php

return array(
    'router' => array(
        'routes' => array(
            'zfcadmin' => array(
                'child_routes' => array(
                    'category' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/category',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Category',
                                'action' => 'index',
                            )
                        )
                    ),
                    'membre' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/membre',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Membre',
                                'action' => 'index',
                            )
                        )
                    ),
                    'event' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/event',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Event',
                                'action' => 'index',
                            )
                        )
                    ),
                )
            ),
            'add_category' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/category/add',
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Category',
                        'action' => 'add',
                    ),
                ),
            ),
            'addmembre' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/membre/addmembre',
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Membre',
                        'action' => 'addmembre',
                    ),
                ),
            ),
            'editmembre' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/membre/editmembre[/:id]',
                    'constraints' => array('id' => '[0-9]+'),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Membre',
                        'action' => 'editmembre',
                    ),
                ),
            ),
            'delete_cat' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/category/delete[/:id]',
                    'constraints' => array('id' => '[0-9]+'),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Category',
                        'action' => 'delete',
                    ),
                ),
            ),
'delete_membre' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/membre/deletemembre[/:id]',
                    'constraints' => array('id' => '[0-9]+'),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Membre',
                        'action' => 'deletemembre',
                    ),
                ),
            ),
            'edit_cat' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/category/edit[/:id]',
                    'constraints' => array('id' => '[0-9]+'),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Category',
                        'action' => 'edit',
                    ),
                ),
            ),
            'add_event' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/event/add',
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Event',
                        'action' => 'add',
                    ),
                ),
            ),
            'edit' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/event/edit[/:id]',
                    'constraints' => array('id' => '[0-9]+'),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Event',
                        'action' => 'edit',
                    ),
                ),
            ),
            'delete_event' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/event/delete[/:id]',
                    'constraints' => array('id' => '[0-9]+'),
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Event',
                        'action' => 'delete',
                    ),
                ),
            ),
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Category' => 'Admin\Controller\CategoryController',
            'Admin\Controller\Membre' => 'Admin\Controller\MembreController',
            'Admin\Controller\Event' => 'Admin\Controller\EventController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../../Forum/view/layout/layout.phtml',
            'admin/category/index' => __DIR__ . '/../view/admin/category/category.phtml',
            'admin/event/index' => __DIR__ . '/../view/admin/event/event.phtml',
            'admin/membre/index' => __DIR__ . '/../view/admin/membre/membre.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
