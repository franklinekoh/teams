<?php

namespace App\Service;

use App\Repository\PlayerTransferRepository;
use App\Model\PlayerTransferDto;
use App\Model\ResponseDto\PlayerTransferResponseDto;
use App\Repository\TeamRepository;
use App\Repository\PlayerRepository;
use App\Mapper\PlayerTransferMapper;

class PlayerTransferService
{
    public function __construct(
       private readonly PlayerTransferRepository $playerTransferRepository,
       private readonly TeamRepository $teamRepository,
       private readonly PlayerRepository $playerRepository,
        private readonly PlayerTransferMapper $playerTransferMapper
    )
    {}

    public function create(PlayerTransferDto $playerTransferDto): PlayerTransferResponseDto
    {
        if ($playerTransferDto->seller_id === $playerTransferDto->buyer_id){
            return new PlayerTransferResponseDto(false, 'cannot transfer between same team');
        }

        $seller = $this->teamRepository->find($playerTransferDto->seller_id);
        if (!$seller){
            return new PlayerTransferResponseDto(false, 'seller id not found');
        }

        $buyer = $this->teamRepository->find($playerTransferDto->buyer_id);
        if (!$buyer){
            return new PlayerTransferResponseDto(false, 'buyer id not found');
        }

        $player = $this->playerRepository->find($playerTransferDto->player_id);
        if (!$player){
            return new PlayerTransferResponseDto(false, 'player id not found');
        }

        if (!$player->isIsFreeAgent()){
            return new PlayerTransferResponseDto(false, 'player is not a available for transfer');
        }

        $sellerHasPlayer = $this->teamRepository->hasPlayer($seller->getId(), $player->getId());

        if (!$sellerHasPlayer){
            return new PlayerTransferResponseDto(false, "seller does not have player with id ". $player->getId());
        }

        if ($buyer->getMoneyBalance() < $player->getWorth()){
            return new PlayerTransferResponseDto(false, 'You do not have sufficient funds to make this purchase');
        }

        $playerTransferEntity = $this->playerTransferMapper->mapDtoToEntity($playerTransferDto);
        $playerTransferEntity->setBuyer($buyer);
        $playerTransferEntity->setSeller($seller);
        $playerTransferEntity->setPlayer($player);
        $playerTransferEntity->setAmount($player->getWorth());

        $this->playerTransferRepository->save($playerTransferEntity, true);

        $buyer->setMoneyBalance($buyer->getMoneyBalance() - $player->getWorth());
        $seller->setMoneyBalance($seller->getMoneyBalance() + $player->getWorth());

        $this->teamRepository->save($buyer, true);
        $this->teamRepository->save($seller, true);

        $player->setTeam($buyer);
        $this->playerRepository->save($player, true);

        return new PlayerTransferResponseDto(true, 'player transfer successful', $playerTransferEntity);
    }
}