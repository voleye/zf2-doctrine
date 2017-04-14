<?php

/** @var $metadata Doctrine\ORM\Mapping\ClassMetadata */
$metadata->setPrimaryTable(array(
    'name' => 'page'
));
$metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadataInfo::GENERATOR_TYPE_AUTO);

$metadata->mapField(array(
    'id'         => true,
    'columnName' => 'page_id',
    'fieldName'  => 'id',
    'type'       => 'integer'
));

$metadata->mapField(array(
    'columnName' => 'code',
    'fieldName'  => 'code',
    'type'       => 'string'
));

$metadata->mapField(array(
    'columnName' => 'created_at',
    'fieldName'  => 'createdAt',
    'type'       => 'datetime'
));

$metadata->mapField(array(
    'columnName' => 'updated_at',
    'fieldName'  => 'updatedAt',
    'type'       => 'datetime'
));


$metadata->mapOneToMany(array(
    'fieldName'     => 'metadata',
    'targetEntity'  => 'Content\Model\Page\Metadata',
    'mappedBy'      => 'page',
    'cascade'       => array('all'),
));

