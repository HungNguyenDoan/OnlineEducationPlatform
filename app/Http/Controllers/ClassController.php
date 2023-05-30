<?php

namespace App\Http\Controllers;

use App\Services\ClassService;
use App\Services\ClassDetailService;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    private $classService, $classDetailService;
    public function __construct(ClassService $classService, ClassDetailService $classDetailService)
    {
        $this->classService = $classService;
        $this->classDetailService = $classDetailService;
    }
    public function createClass(Request $request)
    {
        return $this->classService->createClass($request->all());
    }
    public function getAllClass()
    {
        return $this->classService->getAllClass();
    }
    public function joinClass(Request $request)
    {
        return $this->classService->joinClass($request->classCode);
    }
    public function getDetailClass(Request $request)
    {
        return $this->classDetailService->getAllClassDetail($request->id);
    }
}
