<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\ForgetRequest;
use App\Http\Requests\ConfirmationRequest;
use App\Mail\Auth\ForgetMail;
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
            $token = bcrypt(str_random(60));
            $reset = str_replace('/', '$', $token);

            $user->update(['reset' => $reset]);

            Mail::to($user)->send(new ForgetMail($user));

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

    public function edit(User $user, $reset)
    {
        if ($user->reset === $reset)
            return view('auth.passwords.reset');
        return redirect()->route('login')->with([
            'title' => "Oups...",
            'red' => "Il y a eu un petit problème."
        ]);
    }

    public function update(User $user, $reset, ForgetRequest $request)
    {
        if ($user->reset === $reset) {
            $user->update([
                'password' => $request->password,
                'reset' => null,
            ]);

            return redirect()->route('login')->with([
                'title' => "Mot de passe mise à jour!",
                'blue' => "Félicitations <strong>$user->name</strong>, ton mot de passe a bien été mise à jour!",
            ]);
        }
        return redirect()->route('login')->with([
            'title' => "Oups...",
            'red' => "Il y a eu un petit problème."
        ]);
    }
}
