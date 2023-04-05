<?php

namespace App\Service;

use App\Entity\Place;
use App\Model\PlaceListItem;
use App\Model\PlaceListResponse;
use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\Criteria;

class PlaceService
{
    public function __construct(private readonly PlaceRepository $placeRepository)
    {
    }

    public function getPlaces(): PlaceListResponse
    {
        $places = $this->placeRepository->findBy([], ['number' => Criteria::ASC]);

        $items = array_map(
            fn(Place $place) => new PlaceListItem($place->getId(), $place->getNumber()),
            $places
        );

        return new PlaceListResponse($items);
    }
}