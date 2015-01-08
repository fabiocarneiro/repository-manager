<?php

namespace ZFBrasil\RepositoryManagerTest\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type as DBALType;
use PHPUnit_Framework_TestCase as TestCase;
use ZFBrasil\RepositoryManager\DBAL\Types\RepositoryPath;
use ZFBrasil\RepositoryManager\DBAL\Types\RepositoryType;
use ZFBrasil\RepositoryManager\Model\Type;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class RepositoryTypeTest extends TestCase
{
    /**
     * Register the global dbal type
     */
    public function setUp()
    {
        if (false === DBALType::hasType('repository_type')) {
            DBALType::addType('repository_type', RepositoryType::class);
        }
    }

    /**
     * @test
     */
    public function testCanReturnName()
    {
        $repositoryType = RepositoryType::getType('repository_type');

        $this->assertSame('repository_type', $repositoryType->getName());
    }

    /**
     * @test
     */
    public function testCanConvertValue()
    {
        $repositoryType = RepositoryPath::getType('repository_type');

        $this->assertInstanceOf(
            Type::class,
            $repositoryType->convertToPHPValue('VCS',
                $this->getMockForAbstractClass(AbstractPlatform::class)
            )
        );
    }

    /**
     * @test
     */
    public function testWillReturnNullWithNullInput()
    {
        $repositoryType = RepositoryType::getType('repository_type');

        $this->assertNull(
            $repositoryType->convertToPHPValue(
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
        $repositoryType = RepositoryType::getType('repository_type');

        $asset = new Type('VCS');

        $this->assertSame(
            $asset,
            $repositoryType->convertToPHPValue(
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
        $repositoryType = RepositoryType::getType('repository_type');

        $this->setExpectedException(ConversionException::class);
        $repositoryType->convertToPHPValue('invalid value',
            $this->getMockForAbstractClass(AbstractPlatform::class)
        );
    }
}
