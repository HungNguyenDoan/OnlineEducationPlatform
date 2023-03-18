<?php

namespace App\Http\Controllers;

use App\Services\LessonService;
use Illuminate\Http\Request;

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
}
