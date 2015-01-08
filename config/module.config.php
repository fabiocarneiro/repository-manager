<?php
/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */

use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;
use ZFBrasil\RepositoryManager\DBAL\Types\RepositoryPath;
use ZFBrasil\RepositoryManager\DBAL\Types\RepositoryType;
use ZFBrasil\RepositoryManager\Model;

return [
    'doctrine' => [
        'driver' => [
            'repositorymanager_driver' => [
                'class' => PHPDriver::class,
                'paths' => [
                    __DIR__ . '/../src/Model/Mapping'
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    Model::class => 'repositorymanager_driver'
                ],
            ],
        ],
        'connection' => [
            'orm_default' => [
                'doctrine_type_mappings' => [
                    'repository_path' => 'repository_path',
                    'repository_type' => 'repository_type',
                ],
            ],
        ],
        'configuration' => [
            'orm_default' => [
                'types' => [
                    'repository_path' => RepositoryPath::class,
                    'repository_type' => RepositoryType::class,
                ],
            ],
        ],
    ],
];
