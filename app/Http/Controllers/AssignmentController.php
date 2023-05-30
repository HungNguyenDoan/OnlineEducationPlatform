<?php

namespace App\Http\Controllers;

use App\Services\AssignmentService;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    private $assignmentService;
    public function __construct(AssignmentService $assignmentService)
    {
        $this->assignmentService = $assignmentService;
    }
    public function submit(Request $request)
    {
        
        return $this->assignmentService->createAssignment($request->all(), $request->file('file'));
    }
}
