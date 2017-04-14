<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Content\Model\Navigation;

/**
 * Default navigation factory.
 */
class BreadcrumbsFactory extends \Zend\Navigation\Service\DefaultNavigationFactory
{
    /**
     * @return string
     */
    protected function getName()
    {
        return 'frontend.breadcrumbs';
    }
}
