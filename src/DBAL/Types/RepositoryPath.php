<?php

namespace ZFBrasil\RepositoryManager\DBAL\Types;

use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use ZFBrasil\RepositoryManager\Model\Path;

class RepositoryPath extends StringType
{
    const NAME = 'repository_path';

    /**
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * @param mixed            $value
     * @param AbstractPlatform $platform
     *
     * @return mixed|Path
     * @throws ConversionException
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null || $value instanceof Path) {
            return $value;
        }

        $val = new Path($value);

        if (!$val) {
            throw ConversionException::conversionFailedFormat(
                $value,
                $this->getName(),
                'string'
            );
        }

        return $val;
    }
}