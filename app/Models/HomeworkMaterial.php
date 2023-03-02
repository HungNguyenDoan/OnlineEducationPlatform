<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkMaterial extends Model
{
    use HasFactory;
    protected $table = 'homework_material';
    protected $fillable = [
        'homework_id',
        'url'
    ];
    public function inHomework()
    {
        return $this->belongsTo(Homework::class, 'homework_id', 'id');
    }
}
