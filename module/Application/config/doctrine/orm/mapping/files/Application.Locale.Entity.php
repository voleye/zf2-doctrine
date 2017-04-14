<?php

/** @var $metadata Doctrine\ORM\Mapping\ClassMetadata */
$metadata->setPrimaryTable(array(
    'name' => 'locale'
));
$metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadataInfo::GENERATOR_TYPE_AUTO);

$metadata->mapField(array(
    'id'         => true,
    'columnName' => 'locale_id',
    'fieldName'  => 'identifier',
    'type'       => 'integer'
));

$metadata->mapField(array(
    'columnName' => 'locale',
    'fieldName'  => 'locale',
    'type'       => 'string'
));
