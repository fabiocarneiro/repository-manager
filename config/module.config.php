<?php
/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */

use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;
use ZFBrasil\RepositoryManager\DBAL\Types\RepositoryPath;
use ZFBrasil\RepositoryManager\DBAL\Types\RepositoryType;
use ZFBrasil\RepositoryManager\Model;
use ZFBrasil\RepositoryManager\Service\Factory\RepositoryManagerFactory;
use ZFBrasil\RepositoryManager\Service\RepositoryManager;
use ZFBrasil\RepositoryManager as Module;

return [
    'doctrine' => [
        'driver' => [
            Module::class => [
                'class' => PHPDriver::class,
                'paths' => [
                    __DIR__ . '/../mapping'
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    Model::class => Module::class
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
    'service_manager' => [
        'factories' => [
            RepositoryManager::class => RepositoryManagerFactory::class
        ]
    ]
];
