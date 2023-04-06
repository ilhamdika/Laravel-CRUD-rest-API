<?php

namespace App\Helpers;

class ApiFormater
{
    protected static $response = [
        'meta' => [
            'code' => null,
            'message' => null,
        ],
        'data' => null,
    ];

    public static function createApi($data = null, $message = null, $code = null)
    {
        self::$response['meta']['code'] = $code;
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }
}
