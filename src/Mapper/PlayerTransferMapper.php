<?php

namespace App\Mapper;

use App\Entity\PlayerTransfer;
use App\Model\PlayerTransferDto;

class PlayerTransferMapper
{
    public function mapDtoToEntity(PlayerTransferDto $playerTransferDto): PlayerTransfer
    {
        $playerTransfer = new PlayerTransfer();
        $playerTransfer->setCurrencyCode($playerTransferDto->currency);
        $playerTransfer->setCreatedAt(new \DateTimeImmutable());
        $playerTransfer->setUpdatedAt(new \DateTimeImmutable());
        return $playerTransfer;
    }
}