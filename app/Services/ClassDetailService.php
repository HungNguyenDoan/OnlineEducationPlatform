<?php

namespace App\Services;

use App\Repositories\ClassRepository;
use App\Repositories\HomeworkRepository;
use App\Repositories\LessonRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ClassDetailService
{
    private $classRepository, $lessonRepository, $homeworkRepository, $userRepository;
    public function __construct(ClassRepository $classRepository, LessonRepository $lessonRepository, HomeworkRepository $homeworkRepository)
    {
        $this->classRepository = $classRepository;
        $this->lessonRepository = $lessonRepository;
        $this->homeworkRepository = $homeworkRepository;
    }
    public function getAllClassDetail($classId)
    {
        $classData = $this->classRepository->getById($classId);
        if ($classData != null) {
            $owner = $classData->ownerClass;
            $owner_name = $owner->family_name . " " . $owner->given_name;
            unset($classData->ownerClass);
            $lesson = $this->lessonRepository->getLessonInClass($classId);
            if ($classData->owner_id == Auth::user()->id) {
                $homework = $this->homeworkRepository->staticsHomework($classId);
            }
            else {
                $homework = $this->homeworkRepository->getAllHomeworkByLesson(Auth::user()->id);
            }
            $students = $classData->students;
            foreach ($students as $student) {
                unset($student->created_at);
                unset($student->updated_at);
                unset($student->pivot);
            }
            unset($classData->students);
            return response()->json([
                'status' => true,
                'data' => [
                    'class' => $classData,
                    'is_owner' => $classData->owner_id == Auth::user()->id ? true : false,
                    'lesson' => $lesson,
                    'owner_name' => $owner_name,
                    'student' =>   $classData->owner_id == Auth::user()->id ? $students : null,
                    'homework' => $homework,
                ]
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'This class is not exist',
            ], 404);
        }
    }
}
