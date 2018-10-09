<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\Account\PasswordRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    public function show()
    {
        return view('account.password', [
            'user' => auth()->user()
        ]);
    }

    public function store(User $user, PasswordRequest $request)
    {
        $user->update(['password' => $request->password]);

        return back()->with('flash', "Mot de passe mise à jour!");
    }
}
