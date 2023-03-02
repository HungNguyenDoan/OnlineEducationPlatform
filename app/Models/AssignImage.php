<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignImage extends Model
{
    use HasFactory;
    protected $table = 'assign_image';
    protected $fillable = [
        'assignment_id',
        'url',
    ];
    public function inAssignment()
    {
        return $this->belongsTo(Assignment::class, 'assignment_id', 'id');
    }
}
