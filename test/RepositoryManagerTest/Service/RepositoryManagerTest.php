<?php

namespace ZFBrasil\RepositoryManagerTest\Service;

use Doctrine\Common\Persistence\ObjectRepository;
use PHPUnit_Framework_TestCase as TestCase;
use ZFBrasil\RepositoryManager\Model\Repository;
use ZFBrasil\RepositoryManager\Service\RepositoryManager;
use Doctrine\Common\Persistence\ObjectManager;

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

        $repositoryManager->addRepository(
            Repository::VCS('http://example.com')
        );
    }

    public function testCanRetrieveRepository()
    {
        $objectRepository = $this->getMock(ObjectRepository::class);

        $objectRepository
            ->expects($this->once())
            ->method('find')
            ->with($this->isType('integer'));

        $repositoryManager = new RepositoryManager(
            $this->getMock(ObjectManager::class),
            $objectRepository
        );

        $repositoryManager->getRepository(0);
    }
}
