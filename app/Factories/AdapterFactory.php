<?php

namespace App\Factories;

use App\Adapters\MockOneAdapter;
use App\Adapters\MockTwoAdapter;

class AdapterFactory
{
    /**
     * API adına göre doğru adaptörü döndürür.
     *
     * @param string $apiName
     * @return \App\Adapters\ApiAdapterInterface
     * @throws \Exception
     */
    public static function getAdapter(string $apiName)
    {
        return match ($apiName) {
            'first_api' => new MockOneAdapter(),
            'second_api' => new MockTwoAdapter(),
            default => throw new \Exception("Unknown API: {$apiName}")
        };
    }
}
