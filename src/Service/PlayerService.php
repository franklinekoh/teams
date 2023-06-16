<?php

namespace App\Service;

use App\Model\ResponseDto\PlayerResponseDto;
use App\Repository\PlayerRepository;
use App\Model\PlayerDto;
use App\Entity\Player;
use App\Mapper\PlayerMapper;
use App\Repository\TeamRepository;

class PlayerService
{
    public function __construct(
       private readonly PlayerRepository $playerRepository,
       private readonly PlayerMapper $playerMapper,
       private readonly TeamRepository $teamRepository
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
}