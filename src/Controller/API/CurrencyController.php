<?php

namespace App\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\CurrencyService;

#[Route('/api')]
class CurrencyController extends AbstractController
{
    public function __construct(
        private readonly CurrencyService $currencyService
    )
    {
    }

    #[Route('/currencies', name: 'get_currencies', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $response = $this->currencyService->getAll();
        return $this->json([
            'status' => 'success',
            'message' => 'Currency List',
            'data' => $response
        ]);
    }
}