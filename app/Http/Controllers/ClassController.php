<?php

namespace App\Http\Controllers;

use App\Services\ClassService;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    private $classService;
    public function __construct(ClassService $classService)
    {
        $this->classService = $classService;
    }
    public function createClass(Request $request)
    {
        return $this->classService->createClass($request->all());
    }
    public function getAllOwnerClass()
    {
        return $this->classService->getAllOwnerClass();
    }
    public function joinClass(Request $request)
    {
        return $this->classService->joinClass($request->classCode);
    }
    public function getDetailClass(Request $request)
    {
        return $this->classService->getDetailClass($request->id);
    }
}
