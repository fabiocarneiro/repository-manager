<?php

namespace ZFBrasil\RepositoryManagerTest\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type;
use PHPUnit_Framework_TestCase as TestCase;
use ZFBrasil\RepositoryManager\DBAL\Types\RepositoryPath;
use ZFBrasil\RepositoryManager\Model\Path;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class RepositoryPathTest extends TestCase
{
    /**
     * Register the global dbal type
     */
    public function setUp()
    {
        if (false === Type::hasType('repository_path')) {
            Type::addType('repository_path', RepositoryPath::class);
        }
    }

    /**
     * @test
     */
    public function testCanReturnName()
    {
        $repositoryPath = RepositoryPath::getType('repository_path');

        $this->assertSame('repository_path', $repositoryPath->getName());
    }

    /**
     * @test
     */
    public function testCanConvertValue()
    {
        $repositoryPath = RepositoryPath::getType('repository_path');

        $this->assertInstanceOf(
            Path::class,
            $repositoryPath->convertToPHPValue('http://www.example.com',
                $this->getMockForAbstractClass(AbstractPlatform::class)
            )
        );
    }

    /**
     * @test
     */
    public function testWillReturnNullWithNullInput()
    {
        $repositoryPath = RepositoryPath::getType('repository_path');

        $this->assertNull(
            $repositoryPath->convertToPHPValue(
                null,
                $this->getMockForAbstractClass(AbstractPlatform::class)
            )
        );
    }

    /**
     * @test
     */
    public function testWillReturnSameObject()
    {
        $repositoryPath = RepositoryPath::getType('repository_path');

        $asset = new Path('http://example.com');

        $this->assertSame(
            $asset,
            $repositoryPath->convertToPHPValue(
                $asset,
                $this->getMockForAbstractClass(AbstractPlatform::class)
            )
        );
    }

    /**
     * @test
     */
    public function testInvalidValueThrowsException()
    {
        $repositoryPath = RepositoryPath::getType('repository_path');

        $this->setExpectedException(ConversionException::class);
        $repositoryPath->convertToPHPValue('invalid value',
            $this->getMockForAbstractClass(AbstractPlatform::class)
        );
    }
}
