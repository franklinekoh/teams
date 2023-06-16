<?php

namespace App\Mapper;
use App\Entity\Player;
use App\Model\PlayerDto;

class PlayerMapper
{
    public function mapArrayToEntity(array $playerArray): Player
    {
        $player = new Player();
        if (array_key_exists('first_name', $playerArray)
        && $playerArray['first_name'])
        {
            $player->setFirstName($playerArray['first_name']);
        }
        if (array_key_exists('last_name', $playerArray)
            && $playerArray['last_name'])
        {
            $player->setLastName($playerArray['last_name']);
        }

        if (array_key_exists('worth', $playerArray)
            && $playerArray['worth'])
        {
            $player->setWorth($playerArray['worth']);
        }

        if (array_key_exists('is_free_agent', $playerArray))
        {
            $player->setIsFreeAgent($playerArray['is_free_agent']);
        }

        $player->setCreatedAt(new \DateTimeImmutable());
        $player->setUpdatedAt(new \DateTimeImmutable());
        return $player;
    }

    public function mapDtoToEntity(PlayerDto $playerDto): Player
    {
        $player = new Player();

        $player->setFirstName($playerDto->first_name);
        $player->setLastName($playerDto->last_name);
        $player->setIsFreeAgent($playerDto->is_free_agent);
        $player->setWorth($playerDto->worth);
        $player->setCreatedAt(new \DateTimeImmutable());
        $player->setUpdatedAt(new \DateTimeImmutable());

        return $player;
    }
}