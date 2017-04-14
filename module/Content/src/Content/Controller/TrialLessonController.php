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

class TrialLessonController extends AbstractController
{
    public function indexAction()
    {
        return $this->redirect()->toRoute('root/lesson-request')->setStatusCode(301);
    }
}
