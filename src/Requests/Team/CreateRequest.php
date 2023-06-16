<?php

namespace App\Requests\Team;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use App\Requests\BaseRequest;
use Symfony\Component\Validator\Constraints as Assert;

class CreateRequest extends BaseRequest
{
    #[Type('string')]
    #[NotBlank([])]
    #[Assert\Length(['min' => 3])]
    protected $name;

    #[Type('string')]
    #[NotBlank([])]
    #[Assert\Length(['min' => 3])]
    protected $country;

    #[Type('numeric')]
    #[NotBlank([])]
    protected $money_balance;

    #[NotBlank([])]
    #[Type('array')]
    #[Assert\All([
        new Assert\Collection([
            'fields' => [
                'first_name' => [new Assert\NotBlank(), new Assert\Type(['type' => 'string'])],
                'last_name' => [new Assert\NotBlank(), new Assert\Type(['type' => 'string'])],
                'worth' => [new Assert\NotBlank(), new Assert\Type(['type' => 'numeric'])],
                'is_free_agent' => [new Assert\Type(['type' => 'boolean'])]
            ]
        ])
    ])]
    protected $players;


}