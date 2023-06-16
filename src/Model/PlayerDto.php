<?php

namespace App\Model;

class PlayerDto
{
    public function __construct(
        public string $first_name,
        public string $last_name,
        public bool $is_free_agent,
        public float $worth,
        public int $team_id
    )
    {}
}