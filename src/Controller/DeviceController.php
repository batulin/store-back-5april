<?php

namespace App\Controller;

use App\Attribute\RequestBody;
use App\Model\DeviceCreateRequest;
use App\Service\DeviceService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeviceController extends AbstractController
{
    public function __construct(private readonly DeviceService $deviceService)
    {
    }

    #[Route(path:'/api/device', methods: ['GET'])]
    public function devices(): Response
    {
        $devices = $this->deviceService->getDevices();
        return $this->json($devices);
    }
    #[Route(path: '/api/device', methods: ['POST'])]
    public function addDevice(#[RequestBody] DeviceCreateRequest $deviceCreateRequest): Response
    {
        $this->deviceService->createDevice($deviceCreateRequest);

        return $this->json(null);
    }

    #[Route(path: '/api/device/{id}', methods: ['DELETE'])]
    public function deleteDevice(int $id): Response
    {
        $this->deviceService->deleteDevice($id);

        return $this->json(null);
    }

    #[Route(path: '/api/device/{id}', methods: ['GET'])]
    public function showDevice(int $id): Response
    {
        $device = $this->deviceService->getDevice($id);

        return $this->json($device);
    }

}
