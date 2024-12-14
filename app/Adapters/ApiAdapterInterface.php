<?php

namespace App\Adapters;

interface ApiAdapterInterface
{
    /**
     * API'den gelen veriyi standart bir formata dönüştürür.
     *
     * @param array $response
     * @return array
     */
    public function transform(array $response): array;
}
