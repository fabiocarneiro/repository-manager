<?php

namespace ZFBrasil\RepositoryManagerTest\Model;

use Exception;
use PHPUnit_Framework_TestCase as TestCase;
use ZFBrasil\RepositoryManager\Model\SelectableRepository;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class SelectableRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function testValidTypeReturnRepositoryInstance()
    {
        $repository = SelectableRepository::VCS('http://example.com');

        $this->assertInstanceOf(SelectableRepository::class, $repository);
        $this->assertSame('VCS', $repository->getType());
        $this->assertSame('http://example.com', $repository->getPath());
    }

    /**
     * @test
     */
    public function testCanRetrieveNullIdentifierBeforePersist()
    {
        $repository = SelectableRepository::VCS('http://example.com');

        $this->assertNull($repository->getId());
    }
}
