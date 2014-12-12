<?php

namespace ZFBrasil\RepositoryManagerTest\Service;

use PHPUnit_Framework_TestCase as TestCase;
use ZFBrasil\RepositoryManager\Model\Repository;
use ZFBrasil\RepositoryManager\Service\RepositoryManager;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license proprietary
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
            $this->getMock(RepositoryManager::class)
        );
    }

    public function testCanAddRepository()
    {
        $repository = Repository::VCS('http://example.com');
        $id         = $this->repositoryManager->addRepository($repository);

        $this->assertInstanceOf(Repository::class,
            $this->repositoryManager->getRepository($id)
        );
    }
}
