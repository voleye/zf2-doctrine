<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'db' => array(
        'driver'         => 'pdo_mysql',
        'dsn'            => 'mysql:dbname=voleye.courses;host=localhost',
        'host'           => 'localhost',
        'port'           => '3306',
        'dbname'         => 'voleye.courses',
        'user'           => 'root',
        'password'       => '',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
    ),
    'doctrine' => array(
        'entitymanager' => array(
            'orm_default' => array(
                'connection'    => 'orm_default',
                'configuration' => 'orm_default',
                'eventmanager'  => 'orm_default',
            )
        ),
        'connection' => array(
            'orm_default' => array(
                'driver'         => 'pdo_mysql',
                'host'           => 'localhost',
                'port'           => '3306',
                'dbname'         => 'courses',
                'user'           => 'root',
                'password'       => '',
                'result_cache'   => 'array',
                'driver_options' => array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
                ),
            ),
        ),
        'configuration' => array(
            'orm_default' => array(
                'metadata_cache'     => 'array',
                'query_cache'        => 'array',
                'result_cache'       => 'array',
                'driver'             => 'orm_default',
                'generate_proxies'   => true,
                'proxy_dir'          => 'data/DoctrineORM/Proxy',
                'proxy_namespace'    => 'DoctrineORM\Proxy',
                'naming_strategy'    => '',
                'filters'            => array(),
                'datetime_functions' => array(),
                'string_functions'   => array(),
                'numeric_functions'  => array(),
                'named_queries'      => array(),
                'named_native_queries'   => array(),
                'custom_hydration_modes' => array(),
            )
        ),
        'eventmanager' => array(
            'orm_default' => array(
            )
        ),
        'driver' => array(
            'orm_default' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\DriverChain',
                'drivers' => array()
            )
        ),
    ),
);
