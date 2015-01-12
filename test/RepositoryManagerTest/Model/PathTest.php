<?php

namespace ZFBrasil\RepositoryManagerTest\Model;

use PHPUnit_Framework_TestCase as TestCase;
use ZFBrasil\RepositoryManager\Model\Path;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class PathTest extends TestCase
{
    /**
     * @test
     */
    public function testCanRetrieveUrlFromPath()
    {
        $path = new Path('http://example.com');
        $this->assertSame('http://example.com', $path->getUrl());
        $this->assertSame('http://example.com', (string) $path);
    }
}
