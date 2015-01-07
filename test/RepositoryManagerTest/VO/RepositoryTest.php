<?php

namespace ZFBrasil\RepositoryManagerTest\Model;

use PHPUnit_Framework_TestCase as TestCase;
use ZFBrasil\RepositoryManager\VO\Repository;
use Exception;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class RepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function testValidTypeReturnRepositoryInstance()
    {
        $repository = Repository::VCS('http://example.com');

        $this->assertInstanceOf(Repository::class, $repository);
        $this->assertSame('VCS', $repository->getType());
        $this->assertSame('http://example.com', $repository->getPath());
    }

    /**
     * @test
     */
    public function testCreateInvalidRepositoryThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Repository::INVALID('http://example.com');
    }
}
