<?php

namespace App\Controller;

use App\Attribute\RequestBody;
use App\Model\BrandCreateRequest;
use App\Service\BrandService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BrandController extends AbstractController
{
    public function __construct(private readonly BrandService $brandService)
    {
    }

    #[Route(path:'/api/brand', methods: ['GET'])]
    public function brands(): Response
    {
        $brands = $this->brandService->getBrands();
        return $this->json($brands);
    }
    #[Route(path: '/api/brand', methods: ['POST'])]
    public function addBrand(#[RequestBody] BrandCreateRequest $tyoeCreateRequest): Response
    {
        $this->brandService->createBrand($tyoeCreateRequest);

        return $this->json(null);
    }

    #[Route(path: '/api/brand/{id}', methods: ['DELETE'])]
    public function deleteBrand(int $id): Response
    {
        $this->brandService->deleteBrand($id);

        return $this->json(null);
    }

    #[Route(path: '/api/brand/{id}', methods: ['GET'])]
    public function showBrand(int $id): Response
    {
        $brand = $this->brandService->getBrand($id);

        return $this->json($brand);
    }

}
