<?php

namespace Content\Model\Page;
use Voleye\I18n\LocaleIdentifierMapperAwareInterface;
use Voleye\I18n\LocaleIdentifierMapper;

class Metadata implements LocaleIdentifierMapperAwareInterface
{
    protected $page;

    protected $id;

    protected $pageId;

    protected $localeId;

    protected $locale;

    protected $title;

    protected $text;

    protected $htmlTitle;

    protected $htmlDescription;

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
     * @param mixed $htmlDescription
     */
    public function setHtmlDescription($htmlDescription)
    {
        $this->htmlDescription = $htmlDescription;
    }

    /**
     * @return mixed
     */
    public function getHtmlDescription()
    {
        return $this->htmlDescription;
    }

    /**
     * @param mixed $htmlTitle
     */
    public function setHtmlTitle($htmlTitle)
    {
        $this->htmlTitle = $htmlTitle;
    }

    /**
     * @return mixed
     */
    public function getHtmlTitle()
    {
        return $this->htmlTitle;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $pageId
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;
    }

    /**
     * @return mixed
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
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
