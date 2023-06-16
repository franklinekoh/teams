<?php

namespace App\Mapper;

use App\Entity\Team;
use App\Model\TeamDto;
use App\Mapper\PlayerMapper;

class TeamMapper
{
    public function __construct(
        private PlayerMapper $playerMapper
    )
    {
    }

    public function mapDtoToEntity(TeamDto $teamDto): Team
    {
        $team = new Team();
        if ($teamDto->name){
            $team->setName($teamDto->name);
        }
        if ($teamDto->country){
            $team->setCountry($teamDto->country);
        }
        if ($teamDto->money_balance){
            $team->setMoneyBalance($teamDto->money_balance);
        }
        if (count($teamDto->players) > 0){
            foreach ($teamDto->players as $player){
                $playerEntity = $this->playerMapper->mapArrayToEntity($player);
                $team->addPlayer($playerEntity);
            }
        }

        $team->setCreatedAt(new \DateTimeImmutable());
        $team->setUpdatedAt(new \DateTimeImmutable());
        return $team;
    }
}