<?php

namespace App\Http\Controllers\Backend\Api;

class Response
{
    private $status, $message, $data;

    public static function withData($status, $message, $data)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]);
    }

    public static function withoutData($status, $message)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => []
        ]);
    }
}
