<?php

namespace App\Requests\PlayerTransfer;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints as Assert;
use App\Requests\BaseRequest;

class CreateRequest extends BaseRequest
{
    #[Type('string')]
    #[NotBlank([])]
    #[Assert\Length(['min' => 3])]
    protected $currency;

    #[Type('int')]
    #[NotBlank([])]
    protected $player_id;

    #[Type('int')]
    #[NotBlank([])]
    protected $seller_id;

    #[Type('int')]
    #[NotBlank([])]
    protected $buyer_id;
}