<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Content\Controller;

use Zend\Mvc\MvcEvent;
use Zend\View\Model\ViewModel;
use Application\Controller\AbstractController;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\View\View;

use Content\Model\Lesson\Request;

class LessonRequestController extends AbstractController
{
    /**
     * Form object
     *
     * @var \Zend\Form\Form
     */
    protected $form;

    /**
     * Index action shows request form
     *
     * @return array|ViewModel
     */
    public function indexAction()
    {
        $view = new ViewModel();
        $form = $this->getForm();
        $request = $this->getRequest();
        $isXmlHttpRequest = $request->isXmlHttpRequest();

        $view->setTerminal($isXmlHttpRequest);
        $view->setVariables(array(
            'form' => $form,
            'isXmlHttpRequest' => (int)$isXmlHttpRequest,
        ));

        if (!$isXmlHttpRequest) {
            $viewHelper = $this->getServiceLocator()->get('viewHelperManager');
            /** @var \Zend\View\Helper\HeadTitle $headTitle */
            $headTitle = $viewHelper->get('headTitle');
            $headTitle->append('Lesson request');
        }

        return $view;
    }

    /**
     * Process action, processing request
     *
     * @return \Zend\Http\Response|\Zend\Stdlib\ResponseInterface|ViewModel
     */
    public function processAction()
    {
        $request  = $this->getRequest();
        if (!$request->isPost()) {
            return $this->redirect()->toRoute('root/lesson-request');
        }

        // save data and retrieve error messages array
        /** @var \Zend\Http\PhpEnvironment\Request $request */
        $errors   = array();
        $form     = $this->getForm();
        $response = $this->getResponse();
        try {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                /** @var \Doctrine\ORM\EntityManager $entityManager */
                $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager');
                /** @var \Content\Model\Lesson\Request $lessonRequest */
                $lessonRequest = $this->serviceLocator->get('Lesson\Request');

                $data = $form->getData(\Zend\Form\FormInterface::VALUES_AS_ARRAY);
                $lessonRequest->setData($data);
                $entityManager->persist($lessonRequest);
                $entityManager->flush();

                $this->sendMain(var_export($data, true));
            } else {
                $errors = $form->getMessages();
            }
        } catch (\Exception $e) {
            $errors[] = 'An error occurred while saving request';
        }

        // send response for ajax
        if ($request->isXmlHttpRequest()) {
            if ($errors) {
                $response->setContent(\Zend\Json\Json::encode(array('errors'  => $errors)));
                $view = new ViewModel(array('errors' => $errors));
                $view->setTemplate('content/lesson-request/errors.phtml');
                $view->setTerminal($request->isXmlHttpRequest());
                $renderer = $this->getServiceLocator()->get('ViewRenderer');
                $response->setContent(\Zend\Json\Json::encode(array('content' => $renderer->render($view))));
            } else {
                $view = new ViewModel();
                $view->setTemplate('content/lesson-request/success.phtml');
                $view->setTerminal($request->isXmlHttpRequest());
                $renderer = $this->getServiceLocator()->get('ViewRenderer');
                $response->setContent(\Zend\Json\Json::encode(array('content' => $renderer->render($view))));
            }
            return $response;
        }

        // send response for http
        if ($errors) {
            foreach ($errors as $error) {
                $this->flashMessenger()->addErrorMessage($error);
            }
        }
        $this->flashMessenger()->addSuccessMessage('Request was successfully added');
        return $this->redirect()->toRoute('root/lesson-request', array('action' => 'response'));
    }

    public function responseAction()
    {
        $view = new ViewModel();
        if ($this->flashMessenger()->hasErrorMessages()) {
            $view->setTemplate('content/lesson-request/errors.phtml');
        } else if ($this->flashMessenger()->hasSuccessMessages()) {
            $view->setTemplate('content/lesson-request/success.phtml');
        } else {
            return $this->redirect()->toRoute('root/lesson-request');
        }
        $renderer = $this->getServiceLocator()->get('ViewRenderer');
        return new ViewModel(array('content' => $renderer->render($view)));
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
        if (null === $this->form) {
            $builder = new AnnotationBuilder();
            $this->form = $builder->createForm($this->serviceLocator->get('Lesson\Request'));
            $this->form->setAttribute('action', $this->url()->fromRoute('root/lesson-request', array('action' => 'process')));
        }
        return $this->form;
    }

    protected function sendMain($text)
    {
        /** @var \Zend\Mail\Message $message */
        $message = $this->serviceLocator->get('Zend\Mail\Message');
        /** @var \Zend\Mail\Transport\Sendmail $transport */
        $transport = $this->serviceLocator->get('Zend\Mail\Transport\Sendmail');

        $message->setTo('safetycarukraine@gmail.com');
        $message->setFrom('no-reply@safety-car.com.ua');

        $message->setSubject('Lesson request');
        $message->setBody($text);

        $transport->send($message);
    }
}
