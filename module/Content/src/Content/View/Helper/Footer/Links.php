<?php

namespace Content\View\Helper\Footer;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class Links extends AbstractHelper implements ServiceLocatorAwareInterface
{
    /**
     * @var
     */
    protected $serviceLocator;

    public function __invoke()
    {
        return $this->render(func_get_args());
    }

    public function render($options = array())
    {
        /** @var \Zend\Di\Di $di */
        $di = $this->getServiceLocator()->get('di');
        /** @var \Zend\Cache\Storage\Adapter\AbstractAdapter $cache */
        $cache = $di->get('Zend\Cache\Storage\Adapter\AbstractAdapter');
//        $cache->removeItem('footer_links');
        $result = $cache->getItem('footer_links');
        if (!$result) {
            /** @var \Doctrine\ORM\EntityManager $entityManager */
            $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

            /** @var \Doctrine\ORM\EntityRepository $servicesRepository */
            $servicesRepository = $entityManager->getRepository('Content\Model\Service');
            $services = $servicesRepository->findAll(); //findBy(array(), array('createdAt' => 'ASC'), 10);

            $viewRender = $this->getServiceLocator()->get('ViewRenderer');

            $view = new ViewModel(array(
                'services' => $services
            ));
            $view->setTemplate("layout/footer-links");

            $result = $viewRender->render($view);
            $cache->setItem('footer_links', $result);
        }
        return $result;
    }

    /**
     * Set service locator
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * Get service locator
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
}
