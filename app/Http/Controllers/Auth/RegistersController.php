<?php

namespace App\Http\Controllers\Auth;

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

    public function store(Request $request) {
        $request->validate([
           'name' => 'required|between:3,30|alpha_dash|unique:users,name',
            'email' => 'required|email|confirmed|unique:users,email',
            'password' => 'required|min:6'
        ]);

        User::create($request->all());

        return redirect()->route('login');
    }
}
