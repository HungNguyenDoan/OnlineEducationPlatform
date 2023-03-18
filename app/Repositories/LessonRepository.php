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
        return $this->model->where('class_id', $classId)->get();
    }
}
