<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\ConfirmationRequest;
use App\Mail\NewPassword;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ForgetController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('auth.passwords.forget');
    }

    public function store(ConfirmationRequest $request)
    {
        $user = User::where('name', $request->name)
            ->orWhere('email', $request->name)
            ->first();
        if (! is_null($user)) {
            $password = str_random(8);
            $user->update(['password' => $password]);

            Mail::to($user)->send(new NewPassword($user, $password));

            return back()->with([
                'title' => "Email envoyé!",
                'green' => "Félicitations <strong>$user->name</strong>, l'email contenant ton nouveau mot de passe a été envoyé!",
            ]);
        }
        return back()->with([
            'title' => "L'utilisateur n'existe pas!",
            'red' => "Désolé, je n'ai pas trouvé un utilisateur!"
        ]);
    }
}
