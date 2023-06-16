<?php

namespace App\Model\ResponseDto;

use App\Entity\Team;

class TeamResponseDto
{
    public function __construct(
        public bool $status,
        public string $message,
        public ?Team $data = null
    ){}
}