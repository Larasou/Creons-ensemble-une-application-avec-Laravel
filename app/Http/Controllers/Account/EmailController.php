<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\Account\EmailRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function show()
    {
        return view('account.email', [
            'user' => auth()->user()
        ]);
    }

    public function store(User $user, EmailRequest $request)
    {
        $user->update(['email' => $request->email]);

        return back()->with('flash', "Adresse email mise à jour!");
    }
}
