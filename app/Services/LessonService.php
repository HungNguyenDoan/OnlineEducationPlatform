<?php

namespace App\Services;

use App\Repositories\HomeworkRepository;
use App\Repositories\LessonRepository;
use App\Repositories\MaterialRepository;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LessonService
{
    private $lessonRepository, $materialRepository, $homeworkRepository;
    public function __construct(LessonRepository $lessonRepository, MaterialRepository $materialRepository, HomeworkRepository $homeworkRepository)
    {
        $this->lessonRepository = $lessonRepository;
        $this->materialRepository = $materialRepository;
        $this->homeworkRepository = $homeworkRepository;
    }
    public function createLesson($attributes, UploadedFile $material, UploadedFile $homework)
    {
        DB::beginTransaction();
        try {
            $lesson = $this->lessonRepository->create($attributes);
            $materialName = time() . '.' . $material->getClientOriginalExtension();
            $pathMaterial = $material->storeAs('public/uploads', $materialName);
            $materialData = [
                'lesson_id' => $lesson->id,
                'url' => $pathMaterial,
            ];
            $this->materialRepository->create($materialData);
            $homeworkName = time() . '.' . $homework->getClientOriginalExtension();
            $pathHomework = $homework->storeAs('public/uploads', $homeworkName);
            $homeworkData = [
                'lesson_id' => $lesson->id,
                'url' => $pathHomework,
                'end_time' => $attributes['submitTime']
            ];
            log::info($homeworkData);
            $this->homeworkRepository->create($homeworkData);
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Created successfully',
                'data' => $this->lessonRepository->getLessonInClass($attributes['class_id']),
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
    public function deleteLesson($lessonId)
    {
        $classId = $this->lessonRepository->getById($lessonId)->class_id;
        $this->lessonRepository->delete($lessonId);
        return response()->json([
            'status' => true,
            'data' => $this->getAllLessonInClass($classId)
        ], 200);
    }
}
