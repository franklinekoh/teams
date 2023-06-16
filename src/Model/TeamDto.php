<?php

namespace App\Model;

class TeamDto
{
    public function __construct(
        public string $name,

        public string $country,

        public string $money_balance,

        public array $players
    )
    {
    }
}