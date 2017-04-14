<?php

/** @var $metadata Doctrine\ORM\Mapping\ClassMetadata */
$metadata->setPrimaryTable(array(
    'name' => 'requests'
));
$metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadataInfo::GENERATOR_TYPE_AUTO);

$metadata->mapField(array(
    'id'         => true,
    'columnName' => 'request_id',
    'fieldName'  => 'id',
    'type'       => 'integer'
));

$metadata->mapField(array(
    'columnName' => 'created_at',
    'fieldName'  => 'createdAt',
    'type'       => 'datetime'
));

$metadata->mapField(array(
    'columnName' => 'name',
    'fieldName'  => 'name',
    'type'       => 'string',
));

$metadata->mapField(array(
    'columnName' => 'phone',
    'fieldName'  => 'phone',
    'type'       => 'string',
));

$metadata->mapField(array(
    'columnName' => 'email',
    'fieldName'  => 'email',
    'type'       => 'string',
));

$metadata->mapField(array(
    'columnName' => 'comment',
    'fieldName'  => 'comment',
    'type'       => 'string',
));
