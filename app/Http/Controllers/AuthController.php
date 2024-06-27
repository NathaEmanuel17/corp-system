<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Auth::logout();
        return view('pages.auth.login.index');
    }

    public function changePassword()
    {
        return view('pages.auth.change-password.index');
    }

    public function login(LoginRequest $loginRequest)
    {
        return $this->authService->login($loginRequest->validated());
    }

    public function postChangePassword(ChangePasswordRequest $changePasswordRequest)
    {
        return $this->authService->postChangePassword($changePasswordRequest->validated());
    }

}
