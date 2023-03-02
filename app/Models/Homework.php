<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;
    protected $table = 'homework';
    protected $fillable = [
        'lesson_id',
        'description',
        'end_time',
    ];
    public function inLesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }
    public function homeworkMaterial()
    {
        return $this->hasMany(HomeworkMaterial::class, 'homework_id', 'id');
    }
}
