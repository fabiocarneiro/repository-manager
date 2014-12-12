<?php

namespace ZFBrasil\RepositoryManager\DBAL\Types;

use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use ZFBrasil\RepositoryManager\Model\Type;

class RepositoryType extends StringType
{
    const NAME = 'repository_type';

    public function getName()
    {
        return self::NAME;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null || $value instanceof Type) {
            return $value;
        }

        $val = new Type($value);

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
