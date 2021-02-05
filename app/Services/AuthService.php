<?php

namespace App\Services;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Exception;

class AuthService
{

    public function teste()
    {
        return 'testado';
    }

    public function auth(array $credentials)
    {

        $isAuthenticated = Auth::attempt($credentials);

        if ($isAuthenticated) {
            $token = Auth::user()->createToken("Access-token");
            $token->token->save();

            return response()->json([
                'access_token' => $token->accessToken
            ], Response::HTTP_OK);
        }

        return response()->json([], Response::HTTP_UNAUTHORIZED);
    }
}
