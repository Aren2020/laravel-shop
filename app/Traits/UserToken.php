<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait UserToken
{
    public function getToken($email, $password): array
    {
        $response = Http::post(env('AUTH_BASE_URL') . '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_ID'),
            'client_secret' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET'),
            'username' => $email,
            'password' => $password,
            'scope' => '',
        ]);

        return [
            'data' => $response->json(),
            'status_code' => $response->status()
        ];
    }

    public function refreshToken($refresh_token){
        $response = Http::asForm()->post(env('AUTH_BASE_URL') . '/oauth/token', [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh_token,
            'client_id' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_ID'),
            'client_secret' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET'),
            'scope' => '',
        ]);

        return [
            'data' => $response->json(),
            'status_code' => $response->status()
        ];
    }
}

