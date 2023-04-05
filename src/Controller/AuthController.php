<?php

namespace App\Controller;

use App\Attribute\RequestBody;
use App\Model\SignUpRequest;
use App\Service\SignUpService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Model\IdResponse;

class AuthController extends AbstractController
{
    public function __construct(private SignUpService $signUpService)
    {
    }

    #[Route(path: '/api/signUp', methods: ['POST'])]
    public function signUp(#[RequestBody] SignUpRequest $signUpRequest): Response
    {
        return $this->signUpService->signUp($signUpRequest);
    }
}