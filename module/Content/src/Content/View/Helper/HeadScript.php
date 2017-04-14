<?php

namespace Content\View\Helper;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class HeadScript extends \Zend\View\Helper\HeadScript
{
    /**
     * Optional allowed attributes for script tag
     *
     * @var array
     */
    protected $optionalAttributes = array('defer', 'async', 'data-main', 'charset', 'defer', 'language', 'src');

    public function toString($indent = null)
    {
        foreach ($this as $item) {
            if (!$this->isValid($item)) {
                continue;
            }

            if (isset($item->attributes['src'])) {
                $item->attributes['src'] .= '?' . '007';
            }
        }
        return parent::toString($indent);
    }
}
