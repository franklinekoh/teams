<?php

namespace App\Controller\API;

use App\Service\PlayerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\HttpFoundation\Response;
use App\Requests\Player\CreateRequest;
use App\Model\PlayerDto;

#[Route('/api')]
class PlayerController extends AbstractController
{
    public function __construct(
        private readonly PlayerService $playerService
    )
    {}

    #[Route('/player', name: 'create_player', methods: ['POST'])]
    public function store(CreateRequest $createRequest, #[MapRequestPayload] PlayerDto $playerDto): JsonResponse
    {
        $response = $this->playerService->create($playerDto);

        if (!$response->status){
            return $this->json([
                'status' => 'error',
                'message' => $response->message,
                'data' => $response->data
            ], Response::HTTP_BAD_REQUEST);
        }

        return $this->json([
            'status' => 'success',
            'message' => 'player created',
            'data' => $response->data
        ], Response::HTTP_CREATED);
    }
}