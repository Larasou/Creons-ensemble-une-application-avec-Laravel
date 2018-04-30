<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterRequest;
use App\Mail\RegisterMail;
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
        $user = User::create($request->all());

        \Mail::to($user)->send(new RegisterMail($user));

        return redirect()->route('login')
            ->with([
                'title' => "Félicitions!",
                'violet' => "<strong>$user->name</strong>, ton compte a bien été crée!"
            ]);
    }
}
