<?php

namespace App\Controller;

use App\Attribute\RequestBody;
use App\Model\ClientCreateRequest;
use App\Model\ClientUpdateRequest;
use App\Service\ClientService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    public function __construct(private readonly ClientService $clientService)
    {
    }

    #[Route(path:'/api/client', methods: ['GET'])]
    public function clients(): Response
    {
        $clients = $this->clientService->getClients();
        return $this->json($clients);
    }
    #[Route(path: '/api/client', methods: ['POST'])]
    public function addClient(#[RequestBody] ClientCreateRequest $clientCreateRequest): Response
    {
        $this->clientService->createClient($clientCreateRequest);

        return $this->json(null);
    }

    #[Route(path: '/api/client/{id}', methods: ['DELETE'])]
    public function deleteClient(int $id): Response
    {
        $this->clientService->deleteClient($id);

        return $this->json(null);
    }

    #[Route(path: '/api/client/{id}', methods: ['GET'])]
    public function showClient(int $id): Response
    {
        $client = $this->clientService->getClient($id);

        return $this->json($client);
    }

    #[Route(path: '/api/client/{id}', methods: ['PUT'])]
    public function updateClient(int $id, #[RequestBody] ClientUpdateRequest $request): Response
    {
        $this->clientService->updateClient($id, $request);

        return $this->json(null);
    }
}
