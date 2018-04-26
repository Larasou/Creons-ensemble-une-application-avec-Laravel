<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistersController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create() {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        User::create($request->all());
        return redirect()->route('login');
    }
}
