<?php

namespace Content\Model\Service;
use Voleye\I18n\LocaleIdentifierMapperAwareInterface;
use Voleye\I18n\LocaleIdentifierMapper;

class I18n implements LocaleIdentifierMapperAwareInterface
{
    protected $service;

    protected $id;

    protected $serviceId;

    protected $localeId;

    protected $locale;

    protected $title;

    protected $description;

    protected $shortDescription;

    protected $slideDescription;

    protected $metaDescription;

    protected $metaKeywords;

    /**
     * @var \Voleye\I18n\LocaleIdentifierMapper
     */
    protected $localeIdentifierMapper;

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $localeId
     */
    public function setLocaleId($localeId)
    {
        $this->localeId = $localeId;
    }

    /**
     * @return int
     */
    public function getLocaleId()
    {
        return $this->localeId;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->getLocaleIdentifierMapper()->getLocaleByIdentifier($this->getLocaleId());
    }

    /**
     * @param mixed $serviceId
     */
    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;
    }

    /**
     * @return mixed
     */
    public function getServiceId()
    {
        return $this->serviceId;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * @return mixed
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @param mixed $slideDescription
     */
    public function setSlideDescription($slideDescription)
    {
        $this->slideDescription = $slideDescription;
    }

    /**
     * @return mixed
     */
    public function getSlideDescription()
    {
        return $this->slideDescription;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $value
     */
    public function setMetaDescription($value)
    {
        $this->metaDescription = $value;
    }

    /**
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param string $value
     */
    public function setMetaKeywords($value)
    {
        $this->metaKeywords = $value;
    }

    /**
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * @param  LocaleIdentifierMapper $mapper
     * @return mixed
     */
    public function setLocaleIdentifierMapper(LocaleIdentifierMapper $mapper)
    {
        $this->localeIdentifierMapper = $mapper;
    }

    /**
     * @return LocaleIdentifierMapper
     */
    public function getLocaleIdentifierMapper()
    {
        return $this->localeIdentifierMapper;
    }
}
