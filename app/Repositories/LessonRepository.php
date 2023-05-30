<?php

namespace App\Repositories;

use App\Models\Lesson;

class LessonRepository extends BaseRepository
{
    public function __construct(Lesson $lesson)
    {
        parent::__construct($lesson);
    }
    public function getLessonInClass($classId)
    {
        $lessons = $this->model->where('class_id', $classId)->get();
        foreach ($lessons as $lesson) {
            $lesson->materials;
            $lesson->homework->assignment;
        }
        return $lessons;
    }
}
