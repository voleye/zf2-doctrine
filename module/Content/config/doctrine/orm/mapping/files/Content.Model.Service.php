<?php

/** @var $metadata Doctrine\ORM\Mapping\ClassMetadata */
$metadata->setPrimaryTable(array(
    'name' => 'services'
));
$metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadataInfo::GENERATOR_TYPE_AUTO);

$metadata->mapField(array(
    'id'         => true,
    'columnName' => 'service_id',
    'fieldName'  => 'id',
    'type'       => 'integer'
));

$metadata->mapField(array(
    'columnName' => 'created_at',
    'fieldName'  => 'createdAt',
    'type'       => 'datetime'
));

$metadata->mapField(array(
    'columnName' => 'preview_image',
    'fieldName'  => 'previewImage',
    'type'       => 'string'
));

$metadata->mapField(array(
    'columnName' => 'base_image',
    'fieldName'  => 'baseImage',
    'type'       => 'string'
));

$metadata->mapField(array(
    'columnName' => 'slide_image',
    'fieldName'  => 'slideImage',
    'type'       => 'string'
));

$metadata->mapField(array(
    'columnName' => 'url_path',
    'fieldName'  => 'urlPath',
    'type'       => 'string'
));

$metadata->mapField(array(
    'columnName' => 'updated_at',
    'fieldName'  => 'updatedAt',
    'type'       => 'datetime'
));

$metadata->mapField(array(
    'columnName' => 'slide_order',
    'fieldName'  => 'slideOrder',
    'type'       => 'integer'
));

$metadata->mapOneToMany(array(
    'fieldName'     => 'i18n',
    'targetEntity'  => 'Content\Model\Service\I18n',
    'mappedBy'      => 'service',
    'cascade'       => array('all'),
));

