<?php
// app/Http/Responses/ApiResponse.php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success($data, $message = null, $statusCode = 200)
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
        ], $statusCode);
    }

    public static function error($message, $statusCode = 500)
    {
        return response()->json([
            'error' => $message,
        ], $statusCode);
    }

    public static function notFound($message = 'Resource not found')
    {
        return self::error($message, 404);
    }

    public static function validationError($errors)
    {
        return response()->json([
            'error' => 'Validation failed',
            'errors' => $errors,
        ], 422);
    }

    public static function AuthorizationException($message = 'the user is not authorized to perform a certain action.')
    {
        return self::error($message, 403);
    }

    public static function authenticationException($message = 'Unauthorized')
    {
        return self::error($message, 401);
    }

    public static function queryError($message = 'errors that occur when running database queries')
    {
        return self::error($message, 500);
    }

    public static function httpError($message = 'Http Exception')
    {
        return self::error($message, 404);
    }

    public static function methodNotAllowedHttpError($message = 'The route is accessed with an invalid HTTP method. Timeout ')
    {
        return self::error($message, 405);
    }

    public static function tokenMismatchError($message = 'Authentication Timeout ')
    {
        return self::error($message, 419);
    }

    public static function fileNotFoundError($message = 'File is not found')
    {
        return self::error($message, 404);
    }

    public static function tooManyRequestsHttpError($message = 'Too Many Requests')
    {
        return self::error($message, 429);
    }
}
