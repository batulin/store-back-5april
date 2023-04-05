<?php

namespace App\Service;

use App\Entity\Device;
use App\Model\DeviceCreateRequest;
use App\Model\DeviceDetails;
use App\Model\DeviceListItem;
use App\Model\DeviceListResponse;
use App\Repository\BrandRepository;
use App\Repository\DeviceRepository;
use App\Repository\TypeRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManagerInterface;

class DeviceService
{
    public function __construct(
        private readonly DeviceRepository $deviceRepository,
        private readonly TypeRepository $typeRepository,
        private readonly BrandRepository $brandRepository,
        private readonly EntityManagerInterface $em)
    {
    }

    public function getDevices(): DeviceListResponse
    {
        $devices = $this->deviceRepository->findBy([], ['name' => Criteria::ASC]);

        $items = array_map(
            fn(Device $device) => (new DeviceListItem())
            ->setId($device->getId())
            ->setName($device->getName())
            ->setPrice($device->getPrice())
            ->setRating($device->getRating())
            ->setImg($device->getImg()),
            $devices
        );

        return new DeviceListResponse($items);

    }

    public function createDevice( DeviceCreateRequest $deviceCreateRequest): void
    {
        $type = $this->typeRepository->getTypeById($deviceCreateRequest->getTypeId());
        $brand = $this->brandRepository->getBrandById($deviceCreateRequest->getBrandId());

        $device = (new Device())
            ->setName($deviceCreateRequest->getName())
            ->setPrice($deviceCreateRequest->getPrice())
            ->setRating($deviceCreateRequest->getRating())
            ->setImg($deviceCreateRequest->getImg())
            ->setType($type)
            ->setBrand($brand);

        $this->em->persist($device);
        $this->em->flush();
    }

    public function deleteDevice(int $id): void
    {
        $device = $this->deviceRepository->getDeviceById($id);

        $this->deviceRepository->remove($device, true);
    }

    public function getDevice(int $id): DeviceDetails
    {
        $device = $this->deviceRepository->getDeviceById($id);

        $deviceDetails = (new DeviceDetails())
            ->setId($device->getId())
            ->setName($device->getName())
            ->setPrice($device->getPrice())
            ->setRating($device->getRating())
            ->setImg($device->getImg());

        return $deviceDetails;
    }
}