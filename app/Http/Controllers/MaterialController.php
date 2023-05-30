<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function download(Request $request)
    {
        $path = $request->path;
        $path = storage_path('app/public/uploads/' . $path);
        return response()->download($path);
    }
}
