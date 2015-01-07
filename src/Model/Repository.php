<?php

namespace ZFBrasil\RepositoryManager\Model;

use ZFBrasil\RepositoryManager\VO\Repository as RepositoryVO;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class Repository
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var RepositoryVO
     */
    private $repository;

    public function __construct(RepositoryVO $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return RepositoryVO
     */
    public function getRepository()
    {
        return $this->repository;
    }
}