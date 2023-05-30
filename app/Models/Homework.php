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
        'url',
        'end_time',
    ];
    public function inLesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }
    public function assignment()
    {
        return $this->hasOne(Assignment::class, 'homework_id', 'id');
    }
}
