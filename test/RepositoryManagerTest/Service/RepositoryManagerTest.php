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

        $repository = $repositoryManager->addRepository(
            Repository::VCS('http://example.com')
        );
    }
}
