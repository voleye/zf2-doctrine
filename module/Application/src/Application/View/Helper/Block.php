<?php

namespace Application\View\Helper;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Helper\AbstractHelper;

class Block extends AbstractHelper implements ServiceLocatorAwareInterface
{
    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

    public function __invoke()
    {
        $args = func_get_args();

        $blockName = isset($args[0]) ? $args[0] : null;
        $options = isset($args[1]) && is_array($args[1]) ? $args[1] : array();

        return $this->render($blockName, $options);
    }

    public function render($blockName, $options = array())
    {
        if (!$blockName) {
            return null;
        }

        $blocks = $this->getBlocks();
        if (!isset($blocks[$blockName])) {
            return null;
        }

        $blockInstance = $this->serviceLocator->get($blocks[$blockName]);
        return $blockInstance->render($options);
    }

    protected function getBlocks()
    {
        $config = $this->serviceLocator->get('config');
        return isset($config['view_blocks']) && is_array($config['view_blocks']) ? $config['view_blocks'] : array();
    }

    /**
     * Set service locator
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator->getServiceLocator();
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
