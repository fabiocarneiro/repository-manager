<?php

namespace ZFBrasil\RepositoryManagerTest\Service;

use Doctrine\Common\Persistence\ObjectRepository;
use PHPUnit_Framework_TestCase as TestCase;
use ZFBrasil\RepositoryManager\Model\Repository;
use ZFBrasil\RepositoryManager\Service\RepositoryManager;
use Doctrine\Common\Persistence\ObjectManager;
use ZFBrasil\RepositoryManager\DTO\Repository as DTO;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class RepositoryManagerTest extends TestCase
{
    public function testCanAddRepository()
    {
        $objectManager = $this->getMock(ObjectManager::class);

        $objectManager
            ->expects($this->once())
            ->method('persist')
            ->with($this->isInstanceOf(Repository::class));

        $objectManager
            ->expects($this->once())
            ->method('flush');

        $repositoryManager = new RepositoryManager(
            $objectManager,
            $this->getMock(ObjectRepository::class)
        );

        $repository = new DTO();
        $repository->setPath('http://www.example.com');
        $repository->setType('VCS');

        $repositoryManager->addRepository($repository);
    }

    public function testCanRetrieveRepository()
    {
        $id               = 1;
        $repository       = $this->getMock(SelectableRepository::class);
        $objectRepository = $this->getMock(ObjectRepository::class);

        $objectRepository
            ->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($repository);

        $repositoryManager = new RepositoryManager(
            $this->getMock(ObjectManager::class),
            $objectRepository
        );

        $result = $repositoryManager->getRepository($id);

        $this->assertSame($repository, $result);
    }
}
