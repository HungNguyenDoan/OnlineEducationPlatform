<?php

namespace App\Services;

use App\Repositories\LessonRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LessonService
{
    private $lessonRepository;
    public function __construct(LessonRepository $lessonRepository)
    {
        $this->lessonRepository = $lessonRepository;
    }
    public function createLesson($attributes)
    {
        DB::beginTransaction();
        try {
            $this->lessonRepository->create($attributes);
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Created successfully',
                'data' => $attributes
            ], 200);
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            return response()->json([
                'status' => true,
                'message' => 'Created fail'
            ], 400);
        }
    }
    public function getAllLessonInClass($classId)
    {
        return response()->json([
            'status' => true,
            'data' => $this->lessonRepository->getLessonInClass($classId)
        ], 200);
    }
    public function getLessonDetail($lessonId)
    {
        $lesson = $this->lessonRepository->find($lessonId);
        if (isset($lesson)) {
            return response()->json([
                'status' => true,
                'data' => $lesson
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'This lesson is not exist'
            ], 404);
        }
    }
}
