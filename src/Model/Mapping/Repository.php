<?php

$metadata->isEmbeddedClass = true;

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