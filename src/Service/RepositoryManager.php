<?php

namespace ZFBrasil\RepositoryManager\Service;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use ZFBrasil\RepositoryManager\Model\Repository;
use ZFBrasil\RepositoryManager\Model\SelectableRepository;
use ZFBrasil\RepositoryManager\VO\Repository as RepositoryVO;

/**
 * @author  Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
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

    /**
     * @param ObjectManager    $objectManager
     * @param ObjectRepository $objectRepository
     */
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
        $selectableRepository = SelectableRepository::{$repository->getType()}(
            $repository->getPath()
        );

        $this->objectManager->persist($selectableRepository);
        $this->objectManager->flush();

        return $selectableRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function getRepository($id)
    {
        return $this->objectRepository->find($id);
    }
}
