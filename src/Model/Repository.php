<?php

namespace ZFBrasil\RepositoryManager\Model;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class Repository
{
    /**
     * @var Type
     */
    private $type;

    /**
     * @var Path
     */
    private $path;

    /**
     * @param Type $type
     * @param Path $path
     */
    private function __construct(Type $type, Path $path)
    {
        $this->type = $type;
        $this->path = $path;
    }

    /**
     * @param string $method
     * @param string $arguments
     *
     * @return Repository
     */
    public static function __callStatic($method, $arguments)
    {
        return new self(new Type($method), new Path($arguments[0]));
    }
}
