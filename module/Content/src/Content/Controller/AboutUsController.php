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
use Zend\View\View;

class AboutUsController extends AbstractController
{
    public function indexAction()
    {
        // Set page title
        $viewHelper = $this->getServiceLocator()->get('viewHelperManager');
        /** @var \Zend\View\Helper\HeadTitle $headTitle */
        $headTitle = $viewHelper->get('headTitle');
        $headTitle->append('About us');

        /** @var \Zend\View\Helper\HeadMeta $headMeta */
        $headMeta = $viewHelper->get('headMeta');

        $headMeta->appendName('keywords', 'Safety Car, учебный центр, безопасное вождение, контраварийное вождение, защитное вождение, контраварийное вождение, управление, автомобиль, школа вождения, Киев');
        $headMeta->appendName('description', 'Учебный центр безопасности вождения Safety Car предлагает комплексную систему подготовки целью которой является безаварийное управление автомобилем.');

        $view = new ViewModel();
        return $view;
    }
}
