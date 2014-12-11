<?php

namespace ZFBrasil\RepositoryManagerTest\Model;

use PHPUnit_Framework_TestCase as TestCase;
use ZFBrasil\RepositoryManager\Model\Repository;
use ZFBrasil\RepositoryManager\Model\RepositoryInterface;
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
        $this->assertInstanceOf(
            RepositoryInterface::class,
            Repository::VCS('http://github.com')
        );
    }

    /**
     * @test
     */
    public function testCreateInvalidRepositoryThrowsException()
    {
        $this->setExpectedException(Exception::class);
        Repository::INVALID('http://github.com');
    }
}
