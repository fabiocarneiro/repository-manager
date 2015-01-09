<?php

namespace ZFBrasil\RepositoryManagerTest;

use PHPUnit_Framework_TestCase as TestCase;
use ZFBrasil\RepositoryManager\Module;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class ModuleTest extends TestCase
{
    /**
     * @test
     */
    public function testCanRetrieveConfig()
    {
        $module = new Module();

        $this->assertInternalType('array', $module->getConfig());
    }

    /**
     * @test
     */
    public function testConfigSerializable()
    {
        $module = new Module;

        $this->assertSame(
            $module->getConfig(),
            unserialize(serialize($module->getConfig())),
            'Config is not serializable'
        );
    }
}
