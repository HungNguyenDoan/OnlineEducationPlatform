<?php

namespace App\Services;

use App\Repositories\HomeworkRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function Psy\debug;

class HomeworkService
{
    private $homeworkRepository;
    public function __construct(HomeworkRepository $homeworkRepository)
    {
        $this->homeworkRepository = $homeworkRepository;
    }
    public function createHomework($attributes)
    {
        DB::beginTransaction();
        try {
            $this->homeworkRepository->create($attributes);
            DB::commit();
        } catch (Exception $e) {
            Log::debug($e->getMessage());
        }
    }
    public function getHomework()
    {
    }
    public function editHomework()
    {
    }
    public function deleteHomework()
    {
    }
}
