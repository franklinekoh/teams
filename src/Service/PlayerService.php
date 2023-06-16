<?php

namespace App\Service;

use App\Model\ResponseDto\PlayerResponseDto;
use App\Repository\PlayerRepository;
use App\Model\PlayerDto;
use App\Mapper\PlayerMapper;
use App\Repository\TeamRepository;

class PlayerService
{
    public function __construct(
       private readonly PlayerRepository $playerRepository,
       private readonly PlayerMapper $playerMapper,
       private readonly TeamRepository $teamRepository,
       private readonly PaginatorService $paginatorService
    )
    {
    }

    public function create(PlayerDto $playerDto): PlayerResponseDto
    {
        $team = $this->teamRepository->find($playerDto->team_id);
        if (!$team){
            return new PlayerResponseDto(false, 'player\'s team not found');
        }
        $playerEntity = $this->playerMapper->mapDtoToEntity($playerDto);
        $playerEntity->setTeam($team);
        $this->playerRepository->save($playerEntity, true);
        return new PlayerResponseDto(true, 'player saved successfully', $playerEntity);
    }

    public function getFreeAgents(int $page, int $limit): PaginatorService
    {
        $query = $this->playerRepository->getFreeAgentsQuery();
        //      If I am able to finish on time, I will implement a cache layer for faster loading,
        //      assuming our system has large dataset and heavy traffic.
        return $this->paginatorService->paginate($query, $page, $limit);
    }
}