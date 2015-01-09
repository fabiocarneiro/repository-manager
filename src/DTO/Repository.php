<?php

namespace ZFBrasil\RepositoryManager\DTO;

class Repository
{
    /**
     * @var null|string
     */
    private $type;

    /**
     * @var null|string
     */
    private $path;

    /**
     * @return null|string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param null|string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return null|string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param null|string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
