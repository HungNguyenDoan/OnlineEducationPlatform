<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $table = 'assignment';
    protected $fillable = [
        'homework_id',
        'student_id',
        'assign_at',
        'url',
    ];
    public function inLesson()
    {
        return $this->belongsTo(Homework::class, 'homework_id', 'id');
    }
    public function assignBy()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
    public function imageAssign()
    {
        return $this->hasMany(AssignImage::class, 'assignment_id', 'id');
    }
}
