<?php

namespace App\Service;

use App\Entity\Client;
use App\Model\ClientCreateRequest;
use App\Model\ClientDetails;
use App\Model\ClientListItem;
use App\Model\ClientListResponse;
use App\Model\ClientUpdateRequest;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManagerInterface;

class ClientService
{
    public function __construct(
        private readonly ClientRepository $clientRepository,
        private readonly EntityManagerInterface $em)
    {
    }

    public function getClients(): ClientListResponse
    {
        $clients = $this->clientRepository->findBy([], ['secondName' => Criteria::ASC]);

        $items = array_map(
            fn(Client $client) => (new ClientListItem())
            ->setId($client->getId())
            ->setFirstName($client->getFirstName())
            ->setSecondName($client->getSecondName())
            ->setDescription($client->getDescription())
            ->setPhone($client->getPhone())
            ->setStatus($client->getStatus()),
            $clients
        );

        return new ClientListResponse($items);

    }

    public function createClient(ClientCreateRequest $clientCreateRequest): void
    {
        $client = (new Client())
            ->setFirstName($clientCreateRequest->getFirstName())
            ->setSecondName($clientCreateRequest->getSecondName())
            ->setPhone($clientCreateRequest->getPhone())
            ->setDescription($clientCreateRequest->getDescription())
            ->setStatus("active");

        $this->em->persist($client);
        $this->em->flush();
    }

    public function deleteClient(int $id): void
    {
        $client = $this->clientRepository->getClientById($id);

        $this->clientRepository->remove($client, true);
    }

    public function getClient(int $id): ClientDetails
    {
        $client = $this->clientRepository->getClientById($id);

        $clientDetails = (new ClientDetails())
            ->setId($client->getId())
            ->setFirstName($client->getFirstName())
            ->setSecondName($client->getSecondName())
            ->setPhone($client->getPhone())
            ->setDescription($client->getDescription())
            ->setStatus($client->getStatus());

        return $clientDetails;
    }

    public function updateClient(int $id, ClientUpdateRequest $clientUpdateRequest): void
    {
        $client = $this->clientRepository->getClientById($id);

        $client->setFirstName($clientUpdateRequest->getFirstName());
        $client->setSecondName($clientUpdateRequest->getSecondName());
        $client->setPhone($clientUpdateRequest->getPhone());
        $client->setDescription($clientUpdateRequest->getDescription());
        $client->setStatus($clientUpdateRequest->getStatus());

        $this->em->persist($client);
        $this->em->flush();
    }
}