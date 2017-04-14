<?php
return array(
    'modules' => array(
        'Application',
        'Backend',
        'Content',
        'Instagram',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'navigation' => 'Backend\Model\Navigation\Service\DefaultNavigationFactory',

            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
            // doctrine configuration
            'doctrine.connection.orm_default' => 'Voleye\Doctrine\Service\DBAL\ConnectionFactory',
            'doctrine.configuration.orm_default' => 'Voleye\Doctrine\Service\ORM\ConfigurationFactory',
            'doctrine.entitymanager.orm_default' => 'Voleye\Doctrine\Service\ORM\EntityManagerFactory',
            'doctrine.eventmanager.orm_default' => 'Application\Doctrine\EventManagerFactory',
            'doctrine.driver.orm_default' => 'Voleye\Doctrine\Service\ORM\DriverFactory',
            'doctrine.options' => 'Voleye\Doctrine\Service\Options\OptionsFactory',
        ),
        'invokables' => array(
            // doctrine configuration
            'doctrine.options.options' => 'Voleye\Doctrine\Service\Options\Options',
            'doctrine.cache.array' => 'Doctrine\Common\Cache\ArrayCache',
            'Doctrine\ArrayCollection' => 'Doctrine\Common\Collections\ArrayCollection',
            'doctrine.event.listener.locale' => 'Application\Doctrine\EventListener\Locale',
            'locale.identifier.mapper' => 'Application\Locale\IdentifierMapper',
            'locale.provider' => 'Application\Locale\LocaleProvider',
            'instagram.user' => 'Instagram\User',
        ),
        'aliases' => array(
            // doctrine configuration
            'Doctrine\ORM\EntityManager' => 'doctrine.entitymanager.orm_default',
            'doctrine.entitymanager' => 'doctrine.entitymanager.orm_default',
            'doctrine.connection' => 'doctrine.connection.orm_default',
            'doctrine.configuration' => 'doctrine.configuration.orm_default',
        ),
        'shared' => array(
            'Doctrine\ArrayCollection' => false,
        )
    ),
);
