<?php

namespace App\Exceptions\Auth;

use Illuminate\Http\JsonResponse;
use Exception;
use Throwable;

class AuthException extends Exception
{
    /**
     * @var
     */
    protected $message;
    protected $code;

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $this->message = $message;
        $this->code = $code;
        parent::__construct($message, $code, $previous);
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'message' => $this->message
        ], $this->code);
    }
}
