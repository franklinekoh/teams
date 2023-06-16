<?php

namespace App\Service;

use App\Repository\CurrencyRepository;

class CurrencyService
{
    public function __construct(
        private readonly CurrencyRepository $currencyRepository
    )
    {}

    public function getAll(): array
    {
        return $this->currencyRepository->findAll();
    }
}