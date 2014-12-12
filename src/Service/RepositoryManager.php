<?php

namespace ZFBrasil\RepositoryManager\Service;

use Doctrine\Common\Persistence\ObjectManager;
use ZFBrasil\RepositoryManager\Model\Repository;
use Doctrine\Common\Persistence\ObjectRepository;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license proprietary
 */
class RepositoryManager implements RepositoryManagerInterface
{
    /**
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * @var ObjectRepository
     */
    private $objectRepository;

    public function __construct(
        ObjectManager $objectManager,
        ObjectRepository $objectRepository
    ) {
        $this->objectManager    = $objectManager;
        $this->objectRepository = $objectRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function addRepository(Repository $repository)
    {
        $this->objectManager->persist($repository);
        $this->objectManager->flush();

        return $repository->getId();
    }

    /**
     * @param int $id
     *
     * @return Repository
     */
    public function getRepository($id)
    {
        return $this->objectRepository->find($id);
    }
}
