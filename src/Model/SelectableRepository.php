<?php

namespace ZFBrasil\RepositoryManager\Model;

use ZFBrasil\RepositoryManager\Model\Repository;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class SelectableRepository extends Repository
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public static function __callStatic($method, $arguments)
    {
        return new self(new Type($method), new Path($arguments[0]));
    }
}