<?php

namespace ZFBrasil\RepositoryManager\Service\Factory;

use Doctrine\ORM\EntityManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZFBrasil\RepositoryManager\Model\SelectableRepository;
use ZFBrasil\RepositoryManager\Service\RepositoryManager;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class RepositoryManagerFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return RepositoryManager
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $objectManager = $serviceLocator->get(EntityManager::class);

        return new RepositoryManager(
            $objectManager,
            $objectManager->getRepository(SelectableRepository::class)
        );
    }
}
