<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'doctrine' => array(
        'authentication' => array(
            'orm_default' => array(
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'Backend\Model\Auth\User',
                'identity_property' => 'username',
                'credential_property' => 'password',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
//            'Backend\Controller\Index' => 'Backend\Controller\IndexController',
//            'Backend\Controller\Auth'  => 'Backend\Controller\AuthController',
//            'backend'      => 'Backend\Controller\AuthController',
        ),
    ),
//    'router' => array(
//        'routes' => array(
//            'backend' => array(
//                'type' => 'segment',
//                'options' => array(
//                    'route'    => '/backend[/]',
//                    'defaults' => array(
//                        'controller' => 'Backend\Controller\Index',
//                        'action'     => 'index',
//                    ),
//                ),
//            ),
//            'login' => array(
//                'type' => 'Zend\Mvc\Router\Http\Literal',
//                'options' => array(
//                    'route'    => '/backend/auth',
//                    'defaults' => array(
//                        'controller' => 'Backend\Controller\Auth',
//                        'action'     => 'login',
//                    ),
//                ),
//                'may_terminate' => true,
//                'child_routes' => array(
//                    'process' => array(
//                        'type'    => 'Segment',
//                        'options' => array(
//                            'route'    => '/[:action]',
//                            'constraints' => array(
//                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
//                            ),
//                            'defaults' => array(
//                            ),
//                        ),
//                    ),
//                ),
//            ),
//        ),
//    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'backend/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'navigation' => array(
        'backend' => array(
            array(
                'label' => 'Home',
                'order' => 0,
                'route' => 'backend',
            ),
            array(
                'label' => 'System',
                'order' => 9999,
                'route' => 'login',
                'pages' => array(
                    array(
                        'label' => 'Configuration',
                        'route' => '/backend',
                    ),
                ),
            )
        )
    )
);
