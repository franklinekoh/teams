<?php

namespace App\Service;

use App\Repository\CountryRepository;

class CountryService
{
    public function __construct(
       private readonly CountryRepository $countryRepository
    )
    {
    }

    public function getAll(): array
    {
        return $this->countryRepository->findAll();
    }
}