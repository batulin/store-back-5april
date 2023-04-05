<?php

namespace App\Service;

use App\Entity\Type;
use App\Model\TypeCreateRequest;
use App\Model\TypeDetails;
use App\Model\TypeListItem;
use App\Model\TypeListResponse;
use App\Repository\TypeRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManagerInterface;

class TypeService
{
    public function __construct(
        private readonly TypeRepository $typeRepository,
        private readonly EntityManagerInterface $em)
    {
    }

    public function getTypes(): TypeListResponse
    {
        $types = $this->typeRepository->findBy([], ['name' => Criteria::ASC]);

        $items = array_map(
            fn(Type $tyoe) => (new TypeListItem())
            ->setId($tyoe->getId())
            ->setName($tyoe->getName()),
            $types
        );

        return new TypeListResponse($items);

    }

    public function createType( TypeCreateRequest $typeCreateRequest): void
    {
        $type = (new Type())
            ->setName($typeCreateRequest->getName());

        $this->em->persist($type);
        $this->em->flush();
    }

    public function deleteType(int $id): void
    {
        $type = $this->typeRepository->getTypeById($id);

        $this->typeRepository->remove($type, true);
    }

    public function getType(int $id): TypeDetails
    {
        $type = $this->typeRepository->getTypeById($id);

        $typeDetails = (new TypeDetails())
            ->setId($type->getId())
            ->setName($type->getName());

        return $typeDetails;
    }
}