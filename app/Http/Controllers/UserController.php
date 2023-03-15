<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function register(Request $request)
    {
        return $this->userService->register($request->all());
    }
    public function login(Request $request)
    {
        return $this->userService->authenticate($request->all());
    }
    public function logout()
    {
        $this->userService->logout();
    }
}
