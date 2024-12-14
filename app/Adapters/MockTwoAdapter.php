<?php

namespace App\Adapters;

class MockTwoAdapter implements ApiAdapterInterface
{
    public function transform(array $response): array
    {
        return array_map(function ($item) {
            return [
                'id' => $item['id'],
                'name' => $item['baslik'],
                'estimated_duration' => $item['zorluk'],
                'value' => $item['sure']
            ];
        }, $response);
    }
}
