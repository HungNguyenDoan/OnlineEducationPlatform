<?php

namespace App\Repositories;

use App\Models\LessonMaterial;

class MaterialRepository extends BaseRepository
{
    public function __construct(LessonMaterial $material)
    {
        parent::__construct($material);
    }
}
