<?php

namespace App\Repositories;

use App\Models\StudentClass;

class ClassRepository extends BaseRepository
{
    public function __construct(StudentClass $class)
    {
        parent::__construct($class);
    }
    public function getAllOwnerClass($userId)
    {
        return $this->model->where('owner_id', $userId)->get();
    }
    public function findByClassCode($classCode)
    {
        return $this->model->where('class_code', $classCode)->first();
    }
    public function getDetailClass($classId)
    {
        return $this->model->with('lesson')->where('id', $classId)->get();
    }
    public function getOwnerClass($classId)
    {
        $class = $this->model->with('ownerClass')->where('id', $classId)->first();
        return $class->ownerClass;
    }
}
