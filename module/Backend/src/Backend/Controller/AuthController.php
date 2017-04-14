<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Backend\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\View\Model\ViewModel;

use Backend\Model\Auth\User;

class AuthController extends AbstractActionController
{
    /**
     * Return instance of auth service
     *
     * @return \Zend\Authentication\AuthenticationService $authService
     */
    protected function getAuthService()
    {
        return $this->getServiceLocator()->get('AuthService');
    }

    /**
     * Retrieve instance of form based on AnnotationBuilder object and User object
     *
     * @see \Backend\Model\Auth\User class
     *
     * @return \Zend\Form\Form
     */
    protected function getForm()
    {
        $builder = new AnnotationBuilder();
        $form = $builder->createForm(new User());

        return $form;
    }

    /**
     * Login action
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function loginAction()
    {
        /** @var $authService \Zend\Authentication\AuthenticationService */
        $authService = $this->getServiceLocator()->get('AuthService');
        if ($authService->hasIdentity()) {
            return $this->redirect()->toRoute('backend');
        }

        $view = new ViewModel(array(
            'form'     => $this->getForm(),
            'messages' => $this->flashmessenger()->getMessages()
        ));

        $view->setTerminal(true);
        return $view;
    }

    /**
     * Authentication action
     *
     * @return \Zend\Http\Response
     */
    public function authenticateAction()
    {
        $form = $this->getForm();
        $request = $this->getRequest();

        if ($request->isPost()){
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $authService = $this->getAuthService();
                $authService->getAdapter()
                    ->setIdentity($form->get('username')->getValue())
                    ->setCredential($form->get('password')->getValue());

                $result = $authService->authenticate();
                if ($result->isValid()) {
                    return $this->redirect()->toRoute('backend');
                } else {
                    foreach($result->getMessages() as $message) {
                        $this->flashmessenger()->addMessage($message);
                    }
                }
            }
        }

        return $this->redirect()->toRoute('login');
    }

    /**
     * Logout action
     *
     * @return \Zend\Http\Response
     */
    public function logoutAction()
    {
        $this->getAuthService()->clearIdentity();

        $this->flashmessenger()->addMessage("You've been logged out");
        return $this->redirect()->toRoute('login');
    }
}
