<?php

namespace App\Repositories;

use App\Models\Homework;

class HomeworkRepository extends BaseRepository
{

    public function __construct(Homework $model)
    {
        parent::__construct($model);
    }
}
