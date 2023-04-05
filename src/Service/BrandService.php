<?php

namespace App\Service;

use App\Entity\Brand;
use App\Model\BrandCreateRequest;
use App\Model\BrandDetails;
use App\Model\BrandListItem;
use App\Model\BrandListResponse;
use App\Repository\BrandRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManagerInterface;

class BrandService
{
    public function __construct(
        private readonly BrandRepository $brandRepository,
        private readonly EntityManagerInterface $em)
    {
    }

    public function getBrands(): BrandListResponse
    {
        $brands = $this->brandRepository->findBy([], ['name' => Criteria::ASC]);

        $items = array_map(
            fn(Brand $brand) => (new BrandListItem())
            ->setId($brand->getId())
            ->setName($brand->getName()),
            $brands
        );

        return new BrandListResponse($items);

    }

    public function createBrand( BrandCreateRequest $brandCreateRequest): void
    {
        $brand = (new Brand())
            ->setName($brandCreateRequest->getName());

        $this->em->persist($brand);
        $this->em->flush();
    }

    public function deleteBrand(int $id): void
    {
        $brand = $this->brandRepository->getBrandById($id);

        $this->brandRepository->remove($brand, true);
    }

    public function getBrand(int $id): BrandDetails
    {
        $brand = $this->brandRepository->getBrandById($id);

        $brandDetails = (new BrandDetails())
            ->setId($brand->getId())
            ->setName($brand->getName());

        return $brandDetails;
    }
}