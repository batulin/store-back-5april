<?php

namespace App\Controller;

use App\Service\PlaceService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlaceController extends AbstractController
{
    public function __construct(private readonly PlaceService $placeService)
    {
    }

    #[Route(path:'/api/place', methods: ["GET"])]
    public function places(): Response
    {
        $places = $this->placeService->getPlaces();
        return $this->json($places);
    }
}
