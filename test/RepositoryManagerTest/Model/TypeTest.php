<?php

namespace ZFBrasil\RepositoryManagerTest\Model;

use PHPUnit_Framework_TestCase as TestCase;
use ZFBrasil\RepositoryManager\Model\Type;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class TypeTest extends TestCase
{
    /**
     * @test
     */
    public function testCanReturnType()
    {
        $type = new Type('VCS');
        $this->assertSame('VCS', $type->getName());
    }
}
