<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinStudent extends Model
{
    use HasFactory;
    protected $table = 'join_table';
    protected $fillable = [
        'class_id',
        'student_id',
    ];
}
