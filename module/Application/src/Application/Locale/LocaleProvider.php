<?php

namespace Application\Locale;

use Voleye\I18n\LocaleProviderInterface;

class LocaleProvider implements LocaleProviderInterface
{
    protected $locale;

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    public function getLocale()
    {
        return $this->locale;
    }
}
