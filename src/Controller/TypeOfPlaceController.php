<?php

namespace App\Controller;

use App\Attribute\RequestBody;
use App\Model\TypeCreateRequest;
use App\Model\TypeUpdateRequest;
use App\Service\TypeOfPlaceService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeOfPlaceController extends AbstractController
{
    public function __construct(private readonly TypeOfPlaceService $service)
    {
    }

    #[Route(path: '/api/type_of_place', methods: ['GET'])]
    public function types(): Response
    {
    $types = $this->service->getTypes();
    return $this->json($types);
}
    #[Route(path: '/api/type_of_place', methods: ['POST'])]
    public function addClient(#[RequestBody] TypeCreateRequest $typeCreateRequest): Response
    {
        $this->service->createType($typeCreateRequest);

        return $this->json(null);
    }

    #[Route(path: '/api/type_of_place/{id}', methods: ['DELETE'])]
    public function deleteType(int $id): Response
    {
        $this->service->deleteType($id);

        return $this->json(null);
    }

    #[Route(path: '/api/type_of_place/{id}', methods: ['GET'])]
    public function showType(int $id): Response
    {
        $type = $this->service->getType($id);

        return $this->json($type);
    }

    #[Route(path: '/api/type_of_place/{id}', methods: ['PUT'])]
    public function updateType(int $id, #[RequestBody] TypeUpdateRequest $request): Response
    {
        $this->service->updateType($id, $request);

        return $this->json(null);
    }
}
