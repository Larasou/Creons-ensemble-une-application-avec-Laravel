<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\Account\UsernameRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsernameController extends Controller
{
    public function show()
    {
        return view('account.username', [
            'user' => auth()->user()
        ]);
    }

    public function store(User $user, UsernameRequest $request)
    {
        $user->update(['name' => $request->name]);

        return back()->with('flash', "Nom d'utilisateur mise à jour!");
    }
}
