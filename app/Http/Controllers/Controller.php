<?php

namespace App\Http\Controllers;

use App\Http\HttpStatusCodes\StatusCodes;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use function PHPUnit\Framework\isEmpty;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, StatusCodes;


    public static function sendResponse($result, $successCode, $code = 200)
    {
        $response = [
            'status' => 'success',
            'statusCode' => $code,
            'code' => $successCode,
            'message' => __(static::$HttpCodes[$successCode]["message"]),
            'data' => $result,
        ];

        if (empty($result)) {
            unset($response['data']);
        }

        $code = $code ?? static::$HttpCodes[$successCode]['code'];

        return response()->json($response, $code);
    }

    public static function sendError($errorCode, $errorMessages = [], $code = 404)
    {
        $err = [
            'status' => 'failed',
            'statusCode' => $code,
            'code' => $errorCode,
            'message' => __(static::$HttpCodes[$errorCode]['message']),
        ];

        if (!empty($errorMessages)) {
            $errors = [];
            foreach ($errorMessages as $key => $value) {
                $errors[$key] = is_array($value) ? $value[0] : $value;
            }
            $err['errors'] = $errors;
        }

        $code = $code ?? static::$HttpCodes[$errorCode]['code'];

        return response()->json($err, $code);
    }
}
