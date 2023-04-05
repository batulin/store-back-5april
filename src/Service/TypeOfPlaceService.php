<?php

namespace App\Service;

use App\Entity\TypeOfPlace;
use App\Model\TypeCreateRequest;
use App\Model\TypeDetails;
use App\Model\TypeOfPlaceListItem;
use App\Model\TypeOfPlaceListResponse;
use App\Model\TypeUpdateRequest;
use App\Repository\TypeOfPlaceRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManagerInterface;

class TypeOfPlaceService
{
    public function __construct(
        private readonly TypeOfPlaceRepository $typeOfPlaceRepository,
        private readonly EntityManagerInterface $em)
    {
    }

    public function getTypes(): TypeOfPlaceListResponse
    {
        $types = $this->typeOfPlaceRepository->findBy([], ['slug' => Criteria::ASC]);

        $items = array_map(
            fn(TypeOfPlace $type) => (new TypeOfPlaceListItem())
            ->setId($type->getId())
            ->setTypeName($type->getTypeName())
            ->setSlug($type->getSlug())
            ->setTypePrice($type->getTypePrice()),
            $types
        );

        return new TypeOfPlaceListResponse($items);
    }

    public function createType(TypeCreateRequest $typeCreateRequest): void
    {
        $type = (new TypeOfPlace())
            ->setTypeName($typeCreateRequest->getTypeName())
            ->setSlug($typeCreateRequest->getSlug())
            ->setTypePrice($typeCreateRequest->getTypePrice());

        $this->em->persist($type);
        $this->em->flush();
    }

    public function deleteType(int $id): void
    {
        $type = $this->typeOfPlaceRepository->getTypeById($id);

        $this->typeOfPlaceRepository->remove($type, true);
    }

    public function getType(int $id): TypeDetails
    {
        $type = $this->typeOfPlaceRepository->getTypeById($id);

        $typeDetails = (new TypeDetails())
            ->setId($type->getId())
            ->setTypeName($type->getTypeName())
            ->setSlug($type->getSlug())
            ->setTipePrice($type->getTypePrice());

        return $typeDetails;
    }

    public function updateType(int $id, TypeUpdateRequest $typeUpdateRequest): void
    {
        $type = $this->typeOfPlaceRepository->getTypeById($id);

        $type->setTypeName($typeUpdateRequest->getTypeName());
        $type->setSlug($typeUpdateRequest->getSlug());
        $type->setTypePrice($typeUpdateRequest->getTypePrice());

        $this->em->persist($type);
        $this->em->flush();
    }

}