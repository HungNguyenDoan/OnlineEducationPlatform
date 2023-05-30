<?php

namespace App\Http\Controllers;

use App\Services\LessonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LessonController extends Controller
{
    private $lessonService;
    public function __construct(LessonService $lessonService)
    {
        $this->lessonService = $lessonService;
    }
    public function getAllLessonInClass(Request $request)
    {
        return $this->lessonService->getAllLessonInClass($request->classId);
    }
    public function createLesson(Request $request)
    {
        return $this->lessonService->createLesson($request->all(), $request->file('material'), $request->file('homework'));
    }
    public function getLessonDetail(Request $request)
    {
        return $this->lessonService->getLessonDetail($request->id);
    }
    public function deleteLesson(Request $request)
    {
        return $this->lessonService->deleteLesson($request->lesson_id);
    }
}
