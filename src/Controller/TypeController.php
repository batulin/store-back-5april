<?php

namespace App\Controller;

use App\Attribute\RequestBody;
use App\Model\TypeCreateRequest;
use App\Service\TypeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeController extends AbstractController
{
    public function __construct(private readonly TypeService $typeService)
    {
    }

    #[Route(path:'/api/type', methods: ['GET'])]
    public function types(): Response
    {
        $types = $this->typeService->getTypes();
        return $this->json($types);
    }
    #[Route(path: '/api/type', methods: ['POST'])]
    public function addType(#[RequestBody] TypeCreateRequest $tyoeCreateRequest): Response
    {
        $this->typeService->createType($tyoeCreateRequest);

        return $this->json(null);
    }

    #[Route(path: '/api/type/{id}', methods: ['DELETE'])]
    public function deleteType(int $id): Response
    {
        $this->typeService->deleteType($id);

        return $this->json(null);
    }

    #[Route(path: '/api/type/{id}', methods: ['GET'])]
    public function showType(int $id): Response
    {
        $type = $this->typeService->getType($id);

        return $this->json($type);
    }

}
