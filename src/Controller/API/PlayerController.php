<?php

namespace App\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Requests\Player\CreateRequest;
use App\Model\PlayerDto;
use App\Service\PlayerService;


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

    #[Route('/player/free-agents', name: 'get_free_agents', methods: ['GET'])]
    public function getFreeAgents(Request $request): JsonResponse
    {
        $response = $this->playerService->getFreeAgents($request->query->getInt('page', 1),
            $request->query->getInt('limit', 10));

        return $this->json([
            'status' => 'success',
            'message' => 'List of free agents',
            'data' => $response
        ]);
    }
}