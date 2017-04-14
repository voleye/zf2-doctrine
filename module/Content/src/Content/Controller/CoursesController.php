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

class CoursesController extends AbstractController
{
    public function onDispatch(MvcEvent $e)
    {
        parent::onDispatch($e);
    }

    public function indexAction()
    {
        /** @var \Doctrine\ORM\EntityManager $entityManager */
        $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

        /** @var \Doctrine\ORM\EntityRepository $servicesRepository */
        $servicesRepository = $entityManager->getRepository('Content\Model\Service');
        $services = $servicesRepository->findAll();

        // Set page title
        $viewHelper = $this->getServiceLocator()->get('viewHelperManager');
        /** @var \Zend\View\Helper\HeadTitle $headTitle */
        $headTitle = $viewHelper->get('headTitle');
        $headTitle->append('Курсы');

        /** @var \Zend\View\Helper\HeadMeta $headMeta */
        $headMeta = $viewHelper->get('headMeta');
        $headMeta->appendName('description', 'Safety Car Ukraine школа повышения водительского мастерства предлагает следующие курсы: безопасное вождение, контраварийное вождение, зимний курс, прииемы автоспорта.');
        $headMeta->appendName('keywords', 'безопасное вождение, контраварийное вождение, зимний курс, прииемы автоспорта');

        $view = new ViewModel(array(
            'services' => $services
        ));
        return $view;
    }
}
