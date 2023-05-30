<?php

namespace App\Services;

use App\Repositories\ClassRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use LogicException;

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
                'data' => $this->classRepository->getAllOwnerClass(Auth::user()->id),
            ], 200);
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Failed when creating class',
            ], 400);
        }
    }
    public function getAllClass()
    {
        $user = auth()->user();
        Log::debug($user->joinedClass);
        return response()->json([
            'status' => true,
            'data' => [
                'owner' => $this->classRepository->getAllOwnerClass(Auth::user()->id),
                'joined' => auth()->user()->joinedClass,
            ]
        ]);
    }
    public function joinClass($classCode)
    {
        DB::beginTransaction();
        try {
            $class = $this->classRepository->findByClassCode($classCode);
            if (!isset($class)) {
                throw new Exception("No class match");
            }
            $userId = Auth::user()->id;
            if ($userId == $class->owner_id) {
                throw new LogicException("You are class owner");
            }
            // $owner = $class->students;
            // Log::debug($owner);
            $class->students()->attach(Auth::user()->id);
            DB::commit();
            return response()->json([
                'status' => true,
                'data' => auth()->user()->joinedClass,
                'message' => 'Join class successfully'
            ], 200);
        } catch (LogicException $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 400);
        } catch (Exception $e) {
            Log::debug(json_decode($e->getMessage()));
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'No class match'
            ], 400);
        }
    }
    // public function getDetailClass($classId)
    // {
    //     if ($this->classRepository->find($classId) != null) {
    //         log::debug($this->classRepository->find($classId));
    //         return response()->json([
    //             'status' => true,
    //             'data' => [
    //                 'class' => $this->classRepository->getDetailClass($classId),
    //             ]
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'This class is not exist',
    //         ], 404);
    //     }
    // }
}
