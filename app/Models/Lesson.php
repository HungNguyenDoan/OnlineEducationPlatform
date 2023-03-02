<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $table = 'lesson';
    protected $fillable = [
        'class_id',
        'title',
        'start_time',
        'end_time'
    ];
    public function inClass()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }
    public function homework()
    {
        return $this->hasOne(Homework::class, 'lesson_id', 'id');
    }
}
