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
    /**
     * @var RepositoryManagerInterface
     */
    protected $repositoryManager;

    public function setUp()
    {
        $this->repositoryManager = new RepositoryManager(
            $this->getMock(ObjectManager::class),
            $this->getMock(ObjectRepository::class)
        );
    }

    public function testCanAddRepository()
    {
        $repository = $this->repositoryManager->addRepository(
            Repository::VCS('http://example.com')
        );

        $this->assertInstanceOf(Repository::class,
            $this->repositoryManager->getRepository($repository->getId())
        );
    }
}
