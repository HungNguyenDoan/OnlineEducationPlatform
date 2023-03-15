<?php

namespace App\Services;

use App\Repositories\ClassRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ClassService
{
    private $classRepository;
    public function __construct(ClassRepository $classRepository)
    {
        $this->classRepository = $classRepository;
    }
    public function createClass($attributes)
    {
        DB::beginTransaction();
        try {
            $classCode = uniqid();
            $attributes['class_code'] = $classCode;
            $this->classRepository->create($attributes);
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Created successfully',
                'data' => $attributes
            ]);
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Failed when creating class'
            ]);
        }
    }
    public function getAllOwnerClass()
    {
        return response()->json([
            'status' => true,
            'data' => $this->classRepository->getAllOwnerClass(Auth::user()->id)
        ]);
    }
    public function joinClass($classCode)
    {
        DB::transaction();
        try {
            $class = $this->classRepository->findByClassCode($classCode);
            $class->student()->attach(Auth::user()->id);
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Join class successfully'
            ]);
        } catch (Exception $e) {
            Log::debug(json_decode($e->getMessage()));
            return response()->json([
                'status' => false,
                'message' => 'Failed'
            ]);
        }
    }
}
