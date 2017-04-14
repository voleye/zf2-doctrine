<?php

namespace Content\Model;

use Voleye\I18n\LocaleAwareInterface;

class Service implements LocaleAwareInterface
{
    /**
     * @var \Doctrine\ORM\PersistentCollection
     */
    protected $i18n;

    protected $id;

    protected $previewImage;

    protected $baseImage;

    protected $slideImage;

    protected $urlPath;

    protected $createdAt;

    protected $updatedAt;

    protected $slideOrder;

    /**
     * @var string
     */
    protected $locale;

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
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
     * @param mixed $value
     */
    public function setPreviewImage($value)
    {
        $this->previewImage = $value;
    }

    /**
     * @return mixed
     */
    public function getPreviewImage()
    {
        return $this->previewImage;
    }

    /**
     * @param mixed $value
     */
    public function setBaseImage($value)
    {
        $this->baseImage = $value;
    }

    /**
     * @return mixed
     */
    public function getBaseImage()
    {
        return $this->baseImage;
    }

    /**
     * @param mixed $value
     */
    public function setSlideImage($value)
    {
        $this->slideImage = $value;
    }

    /**
     * @return string
     */
    public function getSlideImage()
    {
        return $this->slideImage;
    }

    /**
     * @return mixed
     */
    public function getUrlPath()
    {
        return $this->urlPath;
    }

    /**
     * @param mixed $value
     */
    public function setUrlPath($value)
    {
        $this->urlPath = $value;
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

    /**
     * @param int $value
     */
    public function setSlideOrder($value)
    {
        $this->slideOrder = $value;
    }

    /**
     * @return mixed
     */
    public function getSlideOrder()
    {
        return $this->slideOrder;
    }

    public function getI18n()
    {
        return $this->i18n;
    }

    public function getTitle($locale = null)
    {
        if ($object = $this->findI18n($locale)) {
            return $object->getTitle();
        }
        return null;
    }

    public function getDescription($locale = null)
    {
        if ($object = $this->findI18n($locale)) {
            return $object->getDescription();
        }
        return null;
    }

    public function getShortDescription($locale = null)
    {
        if ($object = $this->findI18n($locale)) {
            return $object->getShortDescription();
        }
        return null;
    }

    public function getSlideDescription($locale = null)
    {
        if ($object = $this->findI18n($locale)) {
            return $object->getSlideDescription();
        }
        return null;
    }

    public function getMetaDescription($locale = null)
    {
        if ($object = $this->findI18n($locale)) {
            return $object->getMetaDescription();
        }
        return null;
    }

    public function getMetaKeywords($locale = null)
    {
        if ($object = $this->findI18n($locale)) {
            return $object->getMetaKeywords();
        }
        return null;
    }

    /**
     * Find metadata object considering locale
     *
     * If locale does not passed - used current locale
     *
     * @param  string|null $locale
     * @return \Content\Model\Service\I18n|null
     */
    protected function findI18n($locale = null)
    {
        if (null === $locale) {
            $locale = $this->getLocale();
        }

        $collection = $this->getI18n();
        if ($locale) {
            $collection = $this->getI18n()->filter(function($datum) use ($locale) {
                /** @var \Content\Model\Service\I18n $datum*/
                return $datum->getLocale() == $locale;
            });
        }

        return $collection ? $collection->first() : null;
    }
}
