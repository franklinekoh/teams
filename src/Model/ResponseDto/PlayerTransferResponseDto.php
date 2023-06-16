<?php

namespace App\Model\ResponseDto;

use App\Entity\PlayerTransfer;

class PlayerTransferResponseDto
{
    public function __construct(
        public bool $status,
        public string $message,
        public ?PlayerTransfer $data = null
    ){}
}