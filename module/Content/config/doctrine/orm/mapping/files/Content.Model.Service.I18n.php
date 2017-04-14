<?php

/** @var $metadata Doctrine\ORM\Mapping\ClassMetadata */
$metadata->setPrimaryTable(array(
    'name' => 'services_i18n'
));
$metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadataInfo::GENERATOR_TYPE_AUTO);

$metadata->mapField(array(
    'id'         => true,
    'columnName' => 'data_id',
    'fieldName'  => 'id',
    'type'       => 'integer'
));

$metadata->mapField(array(
    'columnName' => 'service_id',
    'fieldName'  => 'serviceId',
    'type'       => 'integer'
));

$metadata->mapField(array(
    'columnName' => 'locale_id',
    'fieldName'  => 'localeId',
    'type'       => 'integer'
));

$metadata->mapField(array(
    'columnName' => 'title',
    'fieldName'  => 'title',
    'type'       => 'string'
));

$metadata->mapField(array(
    'columnName' => 'description',
    'fieldName'  => 'description',
    'type'       => 'string'
));

$metadata->mapField(array(
    'columnName' => 'short_description',
    'fieldName'  => 'shortDescription',
    'type'       => 'string'
));

$metadata->mapField(array(
    'columnName' => 'slide_description',
    'fieldName'  => 'slideDescription',
    'type'       => 'string'
));

$metadata->mapField(array(
    'columnName' => 'meta_description',
    'fieldName'  => 'metaDescription',
    'type'       => 'string'
));

$metadata->mapField(array(
    'columnName' => 'meta_keywords',
    'fieldName'  => 'metaKeywords',
    'type'       => 'string'
));

$metadata->mapManyToOne(array(
    'fieldName' => 'service',
    'targetEntity' => 'Content\Model\Service',
    'inversedBy' => 'i18n',
    'joinColumns' => array(array(
        'name' => 'service_id',
        'referencedColumnName' => 'service_id',
    )),
));
