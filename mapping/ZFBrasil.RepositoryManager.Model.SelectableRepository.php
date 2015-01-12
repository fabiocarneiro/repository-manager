<?php

$metadata->mapField(array(
    'id' => true,
    'fieldName' => 'id',
    'type' => 'integer'
));

$metadata->mapField([
    'fieldName' => 'path',
    'type' => 'repository_path',
    'nullable' => true
]);

$metadata->mapField([
    'fieldName' => 'type',
    'type' => 'repository_type',
    'nullable' => true
]);
