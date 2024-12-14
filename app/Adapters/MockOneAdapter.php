<?php

namespace App\Adapters;

class MockOneAdapter implements ApiAdapterInterface
{
    public function transform(array $response): array
    {
        return array_map(function ($item) {
            return [
                'id' => $item['id'],
                'name' => $item['name'],
                'value' => $item['value'],
                'estimated_duration' => $item['estimated_duration']
            ];
        }, $response);
    }
}
