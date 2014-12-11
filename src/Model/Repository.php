<?php

namespace ZFBrasil\RepositoryManager\Model;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class Repository implements RepositoryInterface
{
    /**
     * @var TypeInterface
     */
    private $type;

    /**
     * @var PathInterface
     */
    private $path;

    /**
     * @param TypeInterface $type
     * @param PathInterface $path
     */
    private function __construct(TypeInterface $type, PathInterface $path)
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
