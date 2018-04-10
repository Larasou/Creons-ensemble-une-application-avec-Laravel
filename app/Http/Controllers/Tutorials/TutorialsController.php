<?php

namespace App\Http\Controllers\Tutorials;

use App\Tutorial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorialsController extends Controller
{
    public function index()
    {
        return view('tutorials.tutorials', [
            'tutorials' => Tutorial::latest()->get(),
        ]);
    }
}
