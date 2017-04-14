<?php

namespace Application\Doctrine\EventListener;

use Doctrine\Common\EventArgs;
use Zend\ServiceManager\ServiceLocatorInterface;

class Locale implements \Zend\ServiceManager\ServiceLocatorAwareInterface
{
    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

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

    public function postLoad(EventArgs $e)
    {
        /** @var \Doctrine\ORM\Event\LifecycleEventArgs $e */
        if ($e->getEntity() instanceof \Voleye\I18n\LocaleAwareInterface) {
            $e->getEntity()->setLocale($this->getServiceLocator()->get('locale.provider')->getLocale());
        }

        /** @var \Doctrine\ORM\Event\LifecycleEventArgs $e */
        if ($e->getEntity() instanceof \Voleye\I18n\LocaleIdentifierMapperAwareInterface) {
            $e->getEntity()->setLocaleIdentifierMapper($this->getServiceLocator()->get('locale.identifier.mapper'));
        }
    }
}
