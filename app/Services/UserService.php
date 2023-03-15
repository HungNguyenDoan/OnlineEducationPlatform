<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
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
            Session::put([
                'token' => $token,
                'user' => Auth::user()
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'token' => $token,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorize'
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
            Auth::user()->oAuthAccessToken()->delete();
        }
        return response()->json([
            'status' => true,
            'message' => 'Success',
        ], 200);
    }
}
