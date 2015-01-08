<?php

namespace ZFBrasil\RepositoryManager\DBAL\Types;

use Exception;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use ZFBrasil\RepositoryManager\Model\Type;

class RepositoryType extends StringType
{
    const NAME = 'repository_type';

    /**
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * @param null|string|Type $value
     * @param AbstractPlatform $platform
     *
     * @return null|Type
     * @throws ConversionException
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null || $value instanceof Type) {
            return $value;
        }

        try {
            $val = new Type($value);
        } catch (Exception $e) {
            throw ConversionException::conversionFailedFormat(
                $value,
                $this->getName(),
                'valid repository type'
            );
        }

        return $val;
    }
}
