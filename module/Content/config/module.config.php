<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Content\Controller\Index' => 'Content\Controller\IndexController',
            'Content\Controller\Courses' => 'Content\Controller\CoursesController',
            'Content\Controller\Course' => 'Content\Controller\CourseController',
            'Content\Controller\Team' => 'Content\Controller\TeamController',
            'Content\Controller\AboutUs' => 'Content\Controller\AboutUsController',
            'Content\Controller\LessonRequest' => 'Content\Controller\LessonRequestController',
            'Content\Controller\TrialLesson' => 'Content\Controller\TrialLessonController',
            'Content\Controller\Blog' => 'Content\Controller\BlogController',

            'course'            => 'Content\Controller\CourseController',
            'courses'           => 'Content\Controller\CoursesController',
            'team'              => 'Content\Controller\TeamController',
            'about-us'          => 'Content\Controller\AboutUsController',
            'contacts'          => 'Content\Controller\ContactsController',
            'lesson-request'    => 'Content\Controller\LessonRequestController',
            'trial-lesson'      => 'Content\Controller\TrialLessonController',
            'blog'              => 'Content\Controller\BlogController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'root' => array(
                'type'    => 'segment',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Content\Controller\Index',
                        'action'     => 'index',
                    ),
                    'constraints' => array(
                        'lang' => '[a-zA-Z]{2}',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => ':controller[/:action][/]',
                            'defaults' => array(
                                'controller' => 'Content\Controller\Index',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                    'courses' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => 'courses[/]',
                            'defaults' => array(
                                'controller'    => 'Content\Controller\Courses',
                                'action'        => 'index',
                                '__NAMESPACE__' => 'Content\Controller',
                            ),
                        ),
                    ),
                    'course' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => 'courses/:name[/]',
                            'defaults' => array(
                                'controller'    => 'Content\Controller\Course',
                                'action'        => 'index',
                                '__NAMESPACE__' => 'Content\Controller',
                            ),
                            'constraints' => array(
                                'name' => '[-a-zA-Z0-9]+',
                            ),
                        ),
                    ),
                    'team' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => 'team[/:section][/]',
                            'defaults' => array(
                                'controller'    => 'Content\Controller\Team',
                                'action'        => 'index',
                                '__NAMESPACE__' => 'Content\Controller',
                            ),
                            'constraints' => array(
                                'section' => '(index|photo|video)',
                            ),
                        ),
                    ),
                    'about-us' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => 'about-us[/]',
                            'defaults' => array(
                                'controller'    => 'Content\Controller\AboutUs',
                                'action'        => 'index',
                                '__NAMESPACE__' => 'Content\Controller',
                            ),
                        ),
                    ),
                    'lesson-request' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => 'lesson-request[/:action][/]',
                            'defaults' => array(
                                'controller'    => 'Content\Controller\LessonRequest',
                                'action'        => 'index',
                                '__NAMESPACE__' => 'Content\Controller',
                            ),
                            'constraints' => array(
                                'action' => '[-a-zA-Z0-9]+',
                            ),
                        ),
                    ),
                    'trial-lesson' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => 'trial-lesson[/:action][/]',
                            'defaults' => array(
                                'controller'    => 'Content\Controller\TrialLesson',
                                'action'        => 'index',
                                '__NAMESPACE__' => 'Content\Controller',
                            ),
                            'constraints' => array(
                                'action' => '[-a-zA-Z0-9]+',
                            ),
                        ),
                    ),
                    'blog' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => 'blog[/]',
                            'defaults' => array(
                                'controller'    => 'Content\Controller\Blog',
                                'action'        => 'index',
                                '__NAMESPACE__' => 'Content\Controller',
                            ),
                        ),
                    ),
                    'blog-post' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => 'blog/:year/:month/:post[/]',
                            'defaults' => array(
                                'controller'    => 'Content\Controller\Blog',
                                'action'        => 'post',
                                '__NAMESPACE__' => 'Content\Controller',
                            ),
                        ),
                    ),
                    'blog-category' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => 'blog/category/:category[/]',
                            'defaults' => array(
                                'controller'    => 'Content\Controller\Blog',
                                'action'        => 'index',
                                '__NAMESPACE__' => 'Content\Controller',
                            ),
                        ),
                    ),
                    'blog-date' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => 'blog/:year[/:month][/]',
                            'defaults' => array(
                                'controller'    => 'Content\Controller\Blog',
                                'action'        => 'index',
                                '__NAMESPACE__' => 'Content\Controller',
                            ),
                            'constraints' => array(
                                'year'  => '[\d]{4}',
                                'month' => '[\d]{2}',
                            ),
                        ),
                    ),
                    'blog-tag' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => 'blog/tag/:tag[/]',
                            'defaults' => array(
                                'controller'    => 'Content\Controller\Blog',
                                'action'        => 'index',
                                '__NAMESPACE__' => 'Content\Controller',
                            ),
                        ),
                    ),

                ),
            ),
        ),
    ),

    'service_manager' => array(
        'factories' => array(
            'navigation.frontend.breadcrumbs' => 'Content\Model\Navigation\BreadcrumbsFactory',
            'navigation.frontend.main' => 'Content\Model\Navigation\MainFactory',

        ),
        'invokables' => array(
            'Lesson\Request' => 'Content\Model\Lesson\Request',
        ),
    ),

    'navigation' => array(
        'frontend.breadcrumbs' => array(
            array(
                'label' => 'Main',
                'route' => 'root',
                'pages' => array(
                    array(
                        'label' => 'Courses',
                        'route' => 'root/courses',
                        'pages' => array(
                            array(
                                'route' => 'root/course',
                            )
                        ),
                    ),
                    array(
                        'label' => 'About us',
                        'route' => 'root/about-us',
                    ),
                    array(
                        'label' => 'Blog',
                        'route' => 'root/blog',
                        'pages' => array(
                            array(
                                'route' => 'root/blog-post',
                                'use_route_match' => true,
                            ),
                            array(
                                'label' => 'Category',
                                'route' => 'root/blog-category',
                                'use_route_match' => true,
                            ),
                            array(
                                'label' => 'Date',
                                'route' => 'root/blog-date',
                                'use_route_match' => true,
                            ),
                            array(
                                'label' => 'Tag',
                                'route' => 'root/blog-tag',
                                'use_route_match' => true,
                            ),
                        ),
                    ),
                    array(
                        'label' => 'Contacts',
                        'route' => 'root/default',
                        'controller' => 'contacts',
                    ),
                )
            ),
        ),
        'frontend.main' => array(
            array(
                'label' => 'Courses',
                'route' => 'root/courses',
            ),
            array(
                'label' => 'About us',
                'route' => 'root/about-us',
            ),
            array(
                'label' => 'Blog',
                'route' => 'root/blog',
            ),
            array(
                'label' => 'Contacts',
                'route' => 'root/default',
                'controller' => 'contacts',
            ),
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'frontend/index/index'    => __DIR__ . '/../view/frontend/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'content_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\PHPDriver',
                'paths' => array(
                    __DIR__ . '/doctrine/orm/mapping/files',
                ),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Content' => 'content_driver'
                ),
            ),
        ),
    ),
    'di' => array(
        'definition' => array(
            'class' => array(
            )
        ),
        'instance' => array(
            'aliases' => array(
            ),
        ),
    ),
    'view_blocks' => array(
        'footer_links' => 'Content\View\Helper\Footer\Links'
    ),
    'view_helpers' => array(
        'invokables' => array(
            'headScript' => 'Content\View\Helper\HeadScript',
            'headLink' => 'Content\View\Helper\HeadLink',
            'wordPress' => 'Content\View\Helper\WordPress'
        ),
    ),
);
