<?php
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 0);

date_default_timezone_set('UTC');

// Setup autoloading
require 'init_autoloader.php';

try {
    /** @var \Zend\Cache\Pattern\OutputCache $outputCache */
    $outputCache = \Zend\Cache\PatternFactory::factory('output', array(
        'storage' => \Zend\Cache\StorageFactory::factory(array(
            'adapter' => array(
                'name' => 'filesystem',
                'options' => array(
                    'dirLevel' => 2,
                    'cacheDir' => 'data/cache',
                    'dirPermission' => 0755,
                    'filePermission' => 0666,
                    'namespaceSeparator' => '-full_page-',
                    'ttl' => 720000,
                ),
            ),
            'plugins' => array('serializer'),
        ))
    ));

    $cacheAllowed = empty($_POST);

    if ($cacheAllowed) {
        $cacheKey = md5($_SERVER['REQUEST_URI']);
        $cacheData = $outputCache->start($cacheKey);
        if (!$cacheData) {
            // Run the application!
            $app = Zend\Mvc\Application::init(require 'config/application.config.php');
            $app->run();
            if ($app->getResponse()->getStatusCode() == 200) {
                $outputCache->end();
            }
        }
    } else {
        // Run the application!
        Zend\Mvc\Application::init(require 'config/application.config.php')->run();
    }
} catch (\Exception $e) {
}
