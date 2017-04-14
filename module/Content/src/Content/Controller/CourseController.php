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

class CourseController extends AbstractController
{
    public function onDispatch(MvcEvent $e)
    {
        parent::onDispatch($e);
    }

    public function indexAction()
    {
        $urlPath = $this->params('name');

        /** @var \Doctrine\ORM\EntityManager $entityManager */
        $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

        /** @var \Doctrine\ORM\EntityRepository $servicesRepository */
        $servicesRepository = $entityManager->getRepository('Content\Model\Service');
        $service = $servicesRepository->findOneBy(array('urlPath' => $urlPath));

        if (!$service) {
            return $this->redirect()->toRoute('root/courses');
        }

        // Set page title
        $viewHelper = $this->getServiceLocator()->get('viewHelperManager');
        /** @var \Zend\View\Helper\HeadTitle $headTitle */
        $headTitle = $viewHelper->get('headTitle');
        /** @var \Zend\View\Helper\HeadMeta $headMeta */
        $headMeta = $viewHelper->get('headMeta');

        $headTitle->append($service->getTitle());
        $headMeta->appendName('description', $service->getMetaDescription());
        $headMeta->appendName('keywords', $service->getMetaKeywords());


        $view = new ViewModel(array(
            'service' => $service
        ));
        return $view;
    }
}
