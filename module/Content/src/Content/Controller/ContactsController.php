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

class ContactsController extends AbstractController
{
    public function indexAction()
    {
        // Set page title
        $viewHelper = $this->getServiceLocator()->get('viewHelperManager');
        /** @var \Zend\View\Helper\HeadTitle $headTitle */
        $headTitle = $viewHelper->get('headTitle');
        $headTitle->append('Contacts');

        /** @var \Zend\View\Helper\HeadMeta $headMeta */
        $headMeta = $viewHelper->get('headMeta');

        $headMeta->appendName('keywords', 'Safety Car, учебный центр, контакты, Киев, Украина, занятия');
        $headMeta->appendName('description', 'Safety Car Ukraine. График работы: Понедельник — пятница с 8:00 до 20:00. Киев - наше постоянное место "дислокации" но мы также проводим занятия с выездом по всей Украине.');

        $view = new ViewModel(array(

        ));
        return $view;
    }
}
