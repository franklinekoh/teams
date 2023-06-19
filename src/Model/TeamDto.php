<?php

namespace App\Model;

class TeamDto
{
    public function __construct(
        public string $name,

        public string $country,

        public float $money_balance,

        public array $players
    )
    {
    }
}