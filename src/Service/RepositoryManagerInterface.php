<?php

namespace ZFBrasil\RepositoryManager\Service;

use ZFBrasil\RepositoryManager\Model\Repository;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license proprietary
 */
interface RepositoryManagerInterface
{
    /**
     * Add a repository to the repository list
     *
     * @param Repository $repository
     *
     * @return boolean
     */
    public function addRepository(Repository $repository);
}
