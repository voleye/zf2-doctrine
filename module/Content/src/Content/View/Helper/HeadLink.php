<?php

namespace Content\View\Helper;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class HeadLink extends \Zend\View\Helper\HeadLink
{
    public function toString($indent = null)
    {
        foreach ($this as $item) {
            if (!$this->isValid($item)) {
                continue;
            }
            $item->href .= '?' . '029';
        }
        return parent::toString($indent);
    }
}
