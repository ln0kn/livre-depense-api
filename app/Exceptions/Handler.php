<?php

namespace App\Exceptions;

use App\Http\Responses\ApiResponse;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $exception)
    {
        // Check if the exception is an instance of ModelNotFoundException
        if ($exception instanceof ModelNotFoundException) {
            // If it is, return a notFound response using ApiResponse
            return ApiResponse::notFound('Resource not found');
        }

        // Thrown when validation fails for a form request
        if ($exception instanceof ValidationException) {
            // If it is, return a validationError response using ApiResponse
            return ApiResponse::validationError($exception->errors());
        }

        // Thrown when the user is not authorized to perform a certain action.
        if ($exception instanceof AuthorizationException) {
            // If it is, return a validationError response using ApiResponse
            return ApiResponse::authorizationException('Forbiddenzz');
        }

        // Thrown when the user is not authenticated.
        if ($exception instanceof AuthenticationException) {
            // If it is, return a validationError response using ApiResponse
            return ApiResponse::authenticationException('Unauthorized');
        }

       // Thrown for errors that occur when running database queries.
        if ($exception instanceof QueryException) {
            // If it is, return a validationError response using ApiResponse
            return ApiResponse::queryError('Errors that occur when running database queries');
        }

        // A generic HTTP exception.
        if ($exception instanceof HttpException) {
            // If it is, return a validationError response using ApiResponse
            return ApiResponse::httpError('HTTP exception');
        }

        // Thrown when a route is accessed with an invalid HTTP method.
        if ($exception instanceof MethodNotAllowedHttpException) {
            // If it is, return a validationError response using ApiResponse
            return ApiResponse::methodNotAllowedHttpError('The route is accessed with an invalid HTTP method. Timeout ');
        }


        // Thrown when the CSRF token validation fails.
        if ($exception instanceof TokenMismatchException) {
            // If it is, return a validationError response using ApiResponse
            return ApiResponse::tokenMismatchError('Authentication Timeout ');
        }


        // Thrown when a file is not found.
        if ($exception instanceof FileNotFoundException) {
            // If it is, return a validationError response using ApiResponse
            return ApiResponse::fileNotFoundError('File not Found');
        }

        // Thrown when the rate limit is exceeded.
        if ($exception instanceof TooManyRequestsHttpException) {
            // If it is, return a validationError response using ApiResponse
            return ApiResponse::tooManyRequestsHttpError('Too Many Requests');
        }

        // ... (you can handle other types of exceptions here)

        // If the exception is not one of the specified types, fall back to the default behavior
        return parent::render($request, $exception);
    }
}
