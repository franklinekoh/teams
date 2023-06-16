<?php

namespace App\Requests\Player;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use App\Requests\BaseRequest;
use Symfony\Component\Validator\Constraints as Assert;

class CreateRequest extends BaseRequest
{
    #[Type('string')]
    #[NotBlank([])]
    #[Assert\Length(['min' => 3])]
    protected $first_name;

    #[Type('string')]
    #[NotBlank([])]
    #[Assert\Length(['min' => 3])]
    protected $last_name;

    #[Type('numeric')]
    #[NotBlank([])]
    protected $worth;

    #[Type('boolean')]
    protected $is_free_agent;

    #[Type('int')]
    #[NotBlank([])]
    protected $team_id;

}