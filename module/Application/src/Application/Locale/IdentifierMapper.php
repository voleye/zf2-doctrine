<?php

namespace Application\Locale;

use Zend\ServiceManager\ServiceLocatorInterface;

class IdentifierMapper implements
    \Zend\ServiceManager\ServiceLocatorAwareInterface,
    \Voleye\I18n\LocaleIdentifierMapper
{
    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

    protected $localeIdentifierPair;

    protected $identifierLocalePair;

    protected $initialized;

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

    protected function initialize()
    {
        if (!$this->initialized) {
            /** @var \Doctrine\ORM\EntityManager $entityManager */
            $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

            /** @var \Doctrine\ORM\EntityRepository $news */
            $localeRepository = $entityManager->getRepository('Application\Locale\Entity');
            $collection = $localeRepository->findAll();
            /** @var \Application\Locale\Entity $locale */
            foreach ($collection as $locale) {
                $this->localeIdentifierPair[$locale->getLocale()] = $locale->getIdentifier();
                $this->identifierLocalePair[$locale->getIdentifier()] = $locale->getLocale();
            }
            $this->initialized = true;
        }
    }

    protected function getIdentifierLocalePair()
    {
        $this->initialize();
        return $this->identifierLocalePair;
    }

    protected function getLocaleIdentifierPair()
    {
        $this->initialize();
        return $this->localeIdentifierPair;
    }

    public function getIdentifierByLocale($locale)
    {
        $collection = $this->getLocaleIdentifierPair();
        return isset($collection[$locale]) ? $collection[$locale] : null;
    }

    public function getLocaleByIdentifier($identifier)
    {
        $collection = $this->getIdentifierLocalePair();
        return isset($collection[$identifier]) ? $collection[$identifier] : null;
    }
}
