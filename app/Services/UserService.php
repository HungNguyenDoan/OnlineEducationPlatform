<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserService
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function authenticate($attributes)
    {
        if (auth()->attempt($attributes)) {
            // /** @var \App\Models\User $user **/
            // $user = auth()->user();
            $token = auth()->user()->createToken('AuthenticationToken')->accessToken;
            // dd(Auth::guard('api')->check());
            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'token' => $token,
            ], 200)->cookie('token', $token);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Wrong email or password please try again'
            ], 401);
        }
    }
    public function register($attributes)
    {
        DB::beginTransaction();
        try {
            $attributes['password'] = bcrypt($attributes['password']);
            $this->userRepository->create($attributes);
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Success'
            ], 200);
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Failed'
            ], 400);
        }
    }
    public function logout()
    {
        if (Auth::check()) {
            Cookie::forget('token');
            Auth::user()->oAuthAccessToken()->delete();
        }
        return response()->json([
            'status' => true,
            'message' => 'Success',
        ], 200);
    }
}
