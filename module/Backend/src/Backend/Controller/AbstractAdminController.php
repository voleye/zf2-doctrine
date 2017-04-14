<?php

namespace Backend\Controller;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\Controller\AbstractActionController;

/**
* Basic action controller
*/
abstract class AbstractAdminController extends AbstractActionController
{
    public function onDispatch(MvcEvent $e)
    {
        /** @var $authService \Zend\Authentication\AuthenticationService */
        $authService = $this->getServiceLocator()->get('AuthService');
        if (!$authService->hasIdentity()) {
            $this->redirect()->toRoute('login');
        }

        $this->layout()->setTemplate('backend/layout');

        // get session data and logic process
        parent::onDispatch($e);
    }
}
