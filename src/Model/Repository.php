<?php

namespace ZFBrasil\RepositoryManager\Model;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 * @method static Type VCS(string $method)
 */
class Repository
{
    /**
     * @var Type
     */
    protected $type;

    /**
     * @var Path
     */
    protected $path;

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
        return new static(new Type($method), new Path($arguments[0]));
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
