<?php

namespace App\Controller\API;

use App\Service\CountryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/api')]
class CountryController extends AbstractController
{
    public function __construct(
        private readonly CountryService $countryService
    )
    {}

    #[Route('/countries', name: 'get_countries', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $response = $this->countryService->getAll();
        return $this->json([
            'status' => 'success',
            'message' => 'Countries Lists',
            'data' => $response
        ]);
    }
}