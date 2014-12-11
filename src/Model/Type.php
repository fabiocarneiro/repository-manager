<?php

namespace ZFBrasil\RepositoryManager\Model;

use Exception;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class Type implements TypeInterface
{
    /**
     * Hold the type name
     *
     * @var string
     */
    private $name;

    /**
     * Hold the available types for a repository
     *
     * @var array
     */
    private static $types;

    public function __construct($name)
    {
        if (!isset(static::$types)) {
            static::$types = require __DIR__ . '/../../config/types.config.php';
        }

        if (!array_key_exists($name, static::$types)) {
            throw new Exception;
        }

        $this->name = $name;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }
}
