<?php

namespace App\Service;

use App\Repository\TeamRepository;
use App\Model\TeamDto;
use App\Entity\Team;
use App\Mapper\TeamMapper;
use App\Model\ResponseDto\TeamResponseDto;
use App\Service\PaginatorService;

class TeamService
{
    public function __construct(
        private readonly TeamRepository $teamRepository,
        private readonly TeamMapper $teamMapper,
        private readonly PaginatorService $paginatorService
    )
    {
    }

    public function create(TeamDto $teamDto): TeamResponseDto
    {
        $playersFullName = [];
        foreach ($teamDto->players as $player){
            $playerFullName = $player['first_name'].' '.$player['last_name'];
            if (in_array($playerFullName, $playersFullName)){
                return new TeamResponseDto(false, "player name ${playerFullName} already exists in team data");
            }
            $playersFullName[] = $playerFullName;
        }

        $team = $this->teamMapper->mapDtoToEntity($teamDto);
        $teamNameExists = $this->teamRepository->findOneBy(['name' => $team->getName()]);
        if ($teamNameExists){
            return new TeamResponseDto(false, 'team name already exists, try another name');
        }

        $this->teamRepository->save($team, true);
        return new TeamResponseDto(true, 'team created', $team);
    }

    public function getAll(int $page, int $limit): PaginatorService
    {
        $query = $this->teamRepository->fetchAllTeamsQuery();
//      If I am able to finish on time, I will implement a cache layer for faster loading,
//      assuming our system has large dataset and heavy traffic.
        return $this->paginatorService->paginate($query, $page, $limit);
    }

    public function getTeam(int $id): Team
    {
        return $this->teamRepository->find($id);
    }
}