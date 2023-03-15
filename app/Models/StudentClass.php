<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;
    protected $table = 'class';
    protected $fillable = [
        'class_code',
        'class_name',
        'owner_id',
    ];
    public function ownerClass()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
    public function students()
    {
        return $this->belongsToMany(User::class, JoinStudent::class, 'class_id', 'student_id');
    }
}
