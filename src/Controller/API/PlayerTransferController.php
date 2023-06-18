<?php

namespace App\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\HttpFoundation\Response;
use App\Requests\PlayerTransfer\CreateRequest;
use App\Model\PlayerTransferDto;
use App\Service\PlayerTransferService;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api')]
class PlayerTransferController extends AbstractController
{

    public function __construct(
        private readonly PlayerTransferService $playerTransferService
    )
    {}

    #[Route('/player-transfer', name: 'create_player_transfer', methods: ['POST'])]
    public function store(
        CreateRequest $createRequest,
        #[MapRequestPayload] PlayerTransferDto $playerTransferDto,
        SerializerInterface $serializer): JsonResponse
    {
        $response = $this->playerTransferService->create($playerTransferDto);

        $circularRefHandler = fn($player, $format, $context)=> $player->getName();
        $context = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => $circularRefHandler
        ];

        $responseJson = $serializer->serialize($response, 'json', $context);
        $responseJson = json_decode($responseJson);

        if (!$response->status){
            return $this->json([
                'status' => 'error',
                'message' => $response->message,
                'data' => $response->data
            ], Response::HTTP_BAD_REQUEST);
        }

        return $this->json([
            'status' => 'success',
            'message' => 'Player transfer successful',
            'data' => $responseJson->data
        ], Response::HTTP_CREATED);
    }
}