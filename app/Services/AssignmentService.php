<?php

namespace App\Services;

use App\Repositories\AssignmentRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssignmentService
{
    private $assignmentRepository;
    public function __construct(AssignmentRepository $assignmentRepository)
    {
        $this->assignmentRepository = $assignmentRepository;
    }
    public function createAssignment($attributes, UploadedFile $assignment)
    {
        DB::beginTransaction();
        try {
            $assignmentName = time() . '.' . $assignment->getClientOriginalExtension();
            $pathAssignment = $assignment->storeAs('public/uploads', $assignmentName);
            $assignmentData = [
                'homework_id' => $attributes['homework_id'],
                'student_id' => Auth::user()->id,
                'url' => $pathAssignment,
                'assign_at' => Carbon::now(),
            ];
            $this->assignmentRepository->create($assignmentData);
            DB::commit();
            return response()->json([
                'status' => true,
                'data' => '',
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
            ], 400);
        }
    }
}
