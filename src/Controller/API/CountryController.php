<?php

namespace App\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\CountryService;

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
            'message' => 'Countries List',
            'data' => $response
        ]);
    }
}