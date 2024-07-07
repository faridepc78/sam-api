<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Resources\Api\V1\Auth\AuthResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['mobile' => $request->input('mobile'),
            'password' => $request->input('password')])) {

            return $this->success_response(AuthResource::make(Auth::user()
                ->load('roles.permissions')),
                'the user has successfully logged into his account');
        } else {
            return $this->error_response(401,
                'No information found with this mobile phone');
        }
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();

        return $this->success_response(null,
            'logout was successful');
    }
}
