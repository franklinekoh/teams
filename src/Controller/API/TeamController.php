<?php

namespace App\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use App\Requests\Team\CreateRequest;
use App\Model\TeamDto;
use App\Service\TeamService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

#[Route('/api')]
class TeamController extends AbstractController
{

    public function __construct(
        private readonly TeamService $teamService
    )
    {}

    #[Route('/team', name: 'create_team', methods: ['POST'])]
    public function store(CreateRequest $request, #[MapRequestPayload] TeamDto $teamDto): JsonResponse
    {
        $response = $this->teamService->create($teamDto);

        if (!$response->status){
            return $this->json([
                'status' => 'error',
                'message' => $response->message,
                'data' => $response->data
            ], Response::HTTP_BAD_REQUEST);
        }

        return $this->json([
            'status' => 'success',
            'message' => 'team created',
            'data' => $response->data
        ], Response::HTTP_CREATED);
    }

    #[Route('/team', name: 'get_teams', methods: ['GET'])]
    public function index(Request $request): JsonResponse
    {
        $response = $this->teamService->getAll($request->query->getInt('page', 1),
            $request->query->getInt('limit', 10));

        return $this->json([
            'status' => 'success',
            'message' => 'List of teams',
            'data' => $response
        ]);
    }

    #[Route('/team/{id}', name: 'get_one_team', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        $response = $this->teamService->getTeam($id);

        return $this->json([
            'status' => 'success',
            'message' => 'Team data',
            'data' => $response
        ]);
    }
}