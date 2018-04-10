<?php

namespace App\Http\Controllers\Tutorials;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorialsController extends Controller
{
    public function index()
    {
        return view('tutorials.tutorials');
    }
}
