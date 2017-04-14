<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(

    'service_manager' => array(
        'factories' => array(
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ),
        'invokables' => array(

        )
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'phparray',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.php',
            ),
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
                    'Application' => 'content_driver'
                ),
            ),
        ),
    ),

    'di' => array(
        'definition' => array(
            'class' => array(
                'Zend\Cache\StorageFactory' => array(
                    'methods' => array(
                        'factory' => array(
                            'cfg' => array(
                                'type' => false,
                                'required' => true,
                            ),
                        ),
                    ),
                ),
                'Zend\Cache\Storage\Adapter\AbstractAdapter' => array(
                    'instantiator' => array(
                        'Zend\Cache\StorageFactory',
                        'factory',
                    ),
                ),
            )
        ),
        'instance' => array(
            'Zend\Cache\StorageFactory' => array(
                'parameters' => array(
                    'cfg' => array(
                        'adapter' => array(
                            'name' => 'filesystem',
                            'options' => array(
                                'dirLevel' => 2,
                                'cacheDir' => 'data/cache',
                                'dirPermission' => 0755,
                                'filePermission' => 0666,
                                'namespaceSeparator' => '-db-',
                                'ttl' => 7200,
                            ),
                        ),
                        'plugins' => array('serializer'),
                    ),
                ),
            ),
            'Doctrine\Common\Collections\ArrayCollection' => array(
                'shared' => false
            ),
        )
    ),
    'view_blocks' => array(
    ),
    'view_helpers' => array(
        'invokables' => array(
            'block' => 'Application\View\Helper\Block',
        ),
    ),
);
