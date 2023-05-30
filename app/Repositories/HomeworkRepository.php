<?php

namespace App\Repositories;

use App\Models\Homework;
use Illuminate\Support\Facades\DB;

class HomeworkRepository extends BaseRepository
{

    public function __construct(Homework $model)
    {
        parent::__construct($model);
    }
    public function getHomeworkInClass($classId)
    {
        return $this->model->where('class_id', $classId)->get();
    }
    public function getAllHomeworkByLesson($userId)
    {
        $assignments = DB::table('assignment')
            ->join('homework', 'assignment.homework_id', '=', 'homework.id')
            ->join('lesson', 'homework.lesson_id', '=', 'lesson.id')
            ->select('lesson.title', 'assignment.url')
            ->where('assignment.student_id', '=', $userId)
            ->get();

        return $assignments;
    }
    public function staticsHomework($classId)
    {
        $counts = DB::select("
        SELECT l.title AS lesson_title, COUNT(a.id) AS assignment_count
        FROM lesson AS l
        JOIN class AS c ON l.class_id = c.id
        LEFT JOIN homework AS h ON l.id = h.lesson_id
        LEFT JOIN assignment AS a ON h.id = a.homework_id
        WHERE c.id = :class_id
        GROUP BY l.title
        ", ['class_id' => $classId]);

        return $counts;
    }
}
