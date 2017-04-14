<?php

namespace Application\Doctrine;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Voleye\Doctrine\Service\Options\Options;
use Doctrine\Common\EventManager;
use Doctrine\ORM\Events;

class EventManagerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param  ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var $options Options */
        $options = $serviceLocator->get('doctrine.options');

        $eventManager = new EventManager();
        $eventManager
            ->addEventListener(array(Events::postLoad), $serviceLocator->get('doctrine.event.listener.locale'));

        return $eventManager;
    }
}
