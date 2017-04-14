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

class BlogController extends AbstractController
{
    public function indexAction()
    {
        // Set page title
        $viewHelper = $this->getServiceLocator()->get('viewHelperManager');
        /** @var \Zend\View\Helper\HeadTitle $headTitle */
        $headTitle = $viewHelper->get('headTitle');
        $headTitle->append('Блог');

        /** @var \Content\View\Helper\WordPress $wordpress */
        $wordpress = $viewHelper->get('wordPress');
        $wordpress->requireHeader();
        if (!have_posts()) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        $view = new ViewModel(array(
            'category' => $this->params('category')
        ));
        return $view;
    }

    public function postAction()
    {
        /** @var \Zend\Uri\Http $uri */
        $uri = $this->getRequest()->getUri();
        $uriString = $uri->getScheme() . '://' . $uri->getHost() . $uri->getPath();

        $viewHelper = $this->getServiceLocator()->get('viewHelperManager');
        /** @var \Content\View\Helper\WordPress $wordpress */
        $wordpress = $viewHelper->get('wordPress');
        $wordpress->requireHeader();

        /** @var \WP_Post $post */
        $post = get_post();
        if (!$post) {
            /** @var \Zend\Http\PhpEnvironment\Response $response */
            $response = $this->getResponse();
            $response->setStatusCode(404);
            return;
        }

        /** @var \Zend\View\Helper\HeadTitle $headTitle */
        $headTitle = $viewHelper->get('headTitle');
        $headTitle->append($post->post_title);
        $headTitle->append('Блог');

        $view = new ViewModel(array(
            'pageUri' => $uriString,
            'post'    => $post
        ));
        return $view;
    }
}
