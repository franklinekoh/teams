<?php

namespace App\Model;

class PlayerTransferDto
{
    public function __construct(
        public int $player_id,
        public int $seller_id,
        public int $buyer_id,
        public string $currency
    )
    {}
}