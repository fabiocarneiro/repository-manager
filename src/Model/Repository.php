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

    /**
     * Return the path url
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path->getUrl();
    }

    /**
     * Return the path type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type->getName();
    }
}
