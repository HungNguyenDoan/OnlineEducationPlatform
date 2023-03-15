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
            $classCode = bin2hex(random_bytes(5));
            $attributes['class_code'] = $classCode;
            $attributes['owner_id'] = Auth::user()->id;
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
            ], 400);
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
        DB::beginTransaction();
        try {
            $class = $this->classRepository->findByClassCode($classCode);
            // $owner = $class->students;
            // Log::debug($owner);
            $class->students()->attach(Auth::user()->id);
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Join class successfully'
            ], 200);
        } catch (Exception $e) {
            Log::debug(json_decode($e->getMessage()));
            return response()->json([
                'status' => false,
                'message' => 'Failed'
            ], 400);
        }
    }
    public function getDetailClass($classId)
    {
        if ($this->classRepository->find($classId) != null) {
            return response()->json([
                'status' => true,
                'data' => $this->classRepository->find($classId)
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'This class is not exist',
            ], 404);
        }
    }
}
