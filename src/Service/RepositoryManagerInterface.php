<?php

namespace ZFBrasil\RepositoryManager\Service;

use ZFBrasil\RepositoryManager\Model\Repository;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
interface RepositoryManagerInterface
{
    /**
     * Add a repository to the repository list
     *
     * @param Repository $repository
     *
     * @return int
     */
    public function addRepository(Repository $repository);
}
