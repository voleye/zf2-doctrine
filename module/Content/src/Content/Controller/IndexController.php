<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Content\Controller;

use Zend\View\Model\ViewModel;
use Application\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function indexAction()
    {
        /** @var \Doctrine\ORM\EntityManager $entityManager */
        $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

        /** @var \Doctrine\ORM\EntityRepository $servicesRepository */
        $servicesRepository = $entityManager->getRepository('Content\Model\Service');
        $services = $servicesRepository->findBy(array(), array('slideOrder' => 'ASC'));

        /** @var \Instagram\Endpoint $instagramEndpoint */
        $instagramEndpoint = $this->serviceLocator->get('Instagram\Endpoint');
        $instagramData = $instagramEndpoint->get(\Instagram\Endpoint::ENDPOINT_USER_MEDIA_RECENT);

        $view = new ViewModel(array(
            'instagramData' => $instagramData,
            'services' => $services
        ));

//         Set page title
        $viewHelper = $this->getServiceLocator()->get('viewHelperManager');
        /** @var \Zend\View\Helper\HeadMeta $headMeta */
        $headMeta = $viewHelper->get('headMeta');

        $headMeta->appendName('keywords', 'Safety Car, безопасное вождение, контраварийное вождение, защитное вождение, контраварийное вождение в Киеве, школа вождения');
        $headMeta->appendName('description', 'Safety Car Ukraine - школа контраварийного и безопасного вождения. Курсы повышения водительского мастерства для водителей с различным уровнем подготовки, от базового до спортивного. Киев и вся Украина.');

        return $view;
    }
}
