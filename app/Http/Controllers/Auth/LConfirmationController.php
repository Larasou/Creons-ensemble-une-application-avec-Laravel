<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\ConfirmationRequest;
use App\Mail\RegisterMail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class LConfirmationController extends Controller
{
    public function create()
    {
        return view('auth.confirmation');
    }

    public function store(ConfirmationRequest $request)
    {
        $user = User::where('name', $request->name)
            ->orWhere('email', $request->name)
            ->first();
        if (! is_null($user)) {
            if (is_null($user->token)){
                return back()->with([
                    'title' => "Ton compte est déjà activé!",
                    'red' => "Désolé <strong>$user->name</strong>, ton compte est déjà activé!"
                ]);
            }
            Mail::to($user)->send(new RegisterMail($user));

            return back()->with([
                'title' => "Email envoyé!",
                'green' => "Félicitations <strong>$user->name</strong>, l'email pour confirmer ton compte a bien été envoyé!",
            ]);
        }
        return back()->with([
            'title' => "L'utilisateur n'existe pas!",
            'red' => "Désolé, je n'ai pas trouvé un utilisateur!"
        ]);
    }
}
