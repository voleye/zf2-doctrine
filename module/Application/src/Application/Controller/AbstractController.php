<?php

namespace Application\Controller;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Basic action controller
 */
abstract class AbstractController extends AbstractActionController
{
    public function onDispatch(MvcEvent $e)
    {
        $routeMatch = $e->getRouteMatch();

        $locale = 'ru';
        $routeMatch->setParam('lang', $locale);

        /** @var \Application\Locale\LocaleProvider $localeProvider */
        $localeProvider = $this->getServiceLocator()->get('locale.provider');
        $localeProvider->setLocale($locale);

        /** @var \Zend\I18n\Translator\Translator $translator */
        $translator = $this->getServiceLocator()->get('translator');
        $translator->setLocale($localeProvider->getLocale());

        // get session data and logic process
        parent::onDispatch($e);
    }
}
