<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonMaterial extends Model
{
    use HasFactory;
    protected $table = 'lesson_material';
    protected $fillable = [
        'lesson_id',
        'url'
    ];
    public function inLesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }
}
