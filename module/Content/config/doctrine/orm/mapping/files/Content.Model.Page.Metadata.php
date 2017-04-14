<?php

/** @var $metadata Doctrine\ORM\Mapping\ClassMetadata */
$metadata->setPrimaryTable(array(
    'name' => 'page_metadata'
));
$metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadataInfo::GENERATOR_TYPE_AUTO);

$metadata->mapField(array(
    'id'         => true,
    'columnName' => 'id',
    'fieldName'  => 'id',
    'type'       => 'integer'
));

$metadata->mapField(array(
    'columnName' => 'page_id',
    'fieldName'  => 'pageId',
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
    'columnName' => 'text',
    'fieldName'  => 'text',
    'type'       => 'string'
));

$metadata->mapField(array(
    'columnName' => 'html_title',
    'fieldName'  => 'htmlTitle',
    'type'       => 'string'
));

$metadata->mapField(array(
    'columnName' => 'html_description',
    'fieldName'  => 'htmlDescription',
    'type'       => 'string'
));

$metadata->mapManyToOne(array(
    'fieldName' => 'page',
    'targetEntity' => 'Content\Model\Page',
    'inversedBy' => 'metadata',
    'joinColumns' => array(array(
        'name' => 'page_id',
        'referencedColumnName' => 'page_id',
    )),
));
