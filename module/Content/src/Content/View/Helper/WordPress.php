<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Content\View\Helper;

use Zend\Mvc\ModuleRouteListener;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Exception;
use Zend\Stdlib\Exception as StdlibException;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

class WordPress extends \Zend\View\Helper\AbstractHelper implements ServiceLocatorAwareInterface
{
    /** @var  \Zend\View\HelperPluginManager */
    protected $serviceLocator;

    /**
     * Render WordPress header
     *
     * @return null|string
     */
    public function requireHeader()
    {
        $config = $this->serviceLocator->getServiceLocator()->get('config');
        if (isset($config['wordPress']) && isset($config['wordPress']['dir'])) {
            require_once $config['wordPress']['dir'] . '/wordpress/wp-blog-header.php';
        }
        return null;
    }

    /**
     * Set service locator
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * Get service locator
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
}
