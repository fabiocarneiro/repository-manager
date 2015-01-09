<?php

namespace ZFBrasil\RepositoryManagerTest\Service\Factory;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\Common\Persistence\ObjectManager;
use PHPUnit_Framework_TestCase as TestCase;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZFBrasil\RepositoryManager\Model\SelectableRepository;
use ZFBrasil\RepositoryManager\Service\Factory\RepositoryManagerFactory;
use ZFBrasil\RepositoryManager\Service\RepositoryManager;

class RepositoryManagerFactoryTest extends TestCase
{
    public function testCanCreateRepositoryManager()
    {
        $objectRepository = $this->getMock(ObjectRepository::class);

        $objectManager = $this->getMock(ObjectManager::class);
        $objectManager
            ->expects($this->once())
            ->method('getRepository')
            ->with(SelectableRepository::class)
            ->willreturn($objectRepository);

        $serviceLocator = $this->getMock(ServiceLocatorInterface::class);
        $serviceLocator
            ->expects($this->once())
            ->method('get')
            ->with(ObjectManager::class)
            ->willReturn($objectManager);

        $factory           = new RepositoryManagerFactory();
        $repositoryManager = $factory->createService($serviceLocator);

        $this->assertInstanceOf(RepositoryManager::class, $repositoryManager);
    }
}
