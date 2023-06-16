<?php

namespace App\Model\ResponseDto;

use App\Entity\Player;

class PlayerResponseDto
{
    public function __construct(
        public bool $status,
        public string $message,
        public ?Player $data = null
    ){}
}