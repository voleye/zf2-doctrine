<?php

namespace Content\Model;

use Voleye\I18n\LocaleAwareInterface;

class Page implements LocaleAwareInterface
{
    protected $id;

    protected $code;

    protected $createdAt;

    protected $updatedAt;

    protected $metadata;

    /**
     * Current locale
     *
     * @var string
     */
    protected $locale;

    /**
     * @param  string $locale
     * @return mixed
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

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
     * @param mixed $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return mixed
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getHtmlTitle($locale = null)
    {
        if ($object = $this->findMetadata($locale)) {
            return $object->getHtmlTitle();
        }
        return null;
    }

    public function getHtmlDescription($locale = null)
    {
        if ($object = $this->findMetadata($locale)) {
            return $object->getHtmlDescription();
        }
        return null;
    }

    public function getTitle($locale = null)
    {
        if ($object = $this->findMetadata($locale)) {
            return $object->getTitle();
        }
        return null;
    }

    public function getText($locale = null)
    {
        if ($object = $this->findMetadata($locale)) {
            return $object->getText();
        }
        return null;
    }

    /**
     * Find metadata object considering locale
     *
     * If locale does not passed - used current locale
     *
     * @param  string|null $locale
     * @return \Content\Model\Page\Metadata|null
     */
    protected function findMetadata($locale = null)
    {
        if (null === $locale) {
            $locale = $this->getLocale();
        }

        $collection = $this->getMetadata()->filter(function($datum) use ($locale) {
            /** @var \Content\Model\Page\Metadata $datum*/
            return $datum->getLocale() == $locale;
        });

        return $collection ? $collection->current() : null;
    }
}
