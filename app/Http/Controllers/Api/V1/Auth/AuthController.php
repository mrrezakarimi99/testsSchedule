<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Events\LoginAttempt;
use App\Exceptions\Auth\AuthException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Requests\Api\V1\Auth\RegisterRequest;
use App\Http\Resources\Api\V1\Auth\AuthResource;
use App\Models\User;
use App\Notifications\loginNotification;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method validate(Request $request, string[] $array)
 */
class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return AuthResource
     * @throws AuthException
     */
    public function login(LoginRequest $request): AuthResource
    {
        if (!auth()->attempt($request->validated())) {
            throw new AuthException('invalid info!!', Response::HTTP_METHOD_NOT_ALLOWED);
        }
        $token = $this->createToken();
        $user = auth()->user();
        event(new LoginAttempt($user , $request));
        return new AuthResource($user, $token);
    }

    /**
     * @param RegisterRequest $request
     * @return AuthResource
     */
    public function register(RegisterRequest $request): AuthResource
    {
        $user = User::create($request->validated());
        auth()->login($user);
        $token = $this->createToken();
        return new AuthResource($user, $token);
    }


    /**
     * @return string
     */
    private function createToken(): string
    {
        auth()->user()->tokens()->delete();
        return auth()->user()->createToken('Login')->accessToken->token;
    }
}
