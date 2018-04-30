<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create() {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {

        $user = User::where('name', $request->name)
            ->orWhere('email', $request->name)
            ->first();
        if ($user) {

            if ($user->rank < 2) {
                return back()->with([
                    'title' => "Compte non validé!",
                    'orange' => "<strong>$user->name</strong>, ton n'a pas encore été validé!"
                ]);
            }

            if (\Hash::check($request->password, $user->password)) {
                if ($request->remember) {
                    auth()->login($user, true);
                    return redirect($request->redirect);
                }
                auth()->login($user);
                return redirect($request->redirect);
            }
            return back();
        }
        return back();
    }

    public function validation(User $user, $token)
    {
        if ($user->exists){
            if ($user->token === $token) {
                $user->update([
                    'rank' => 2,
                    'token' => null
                ]);
                return redirect('/')->with([
                    'title' => "<strong>$user->name</strong>, ton compte a bien été validé!",
                    'green' => "Félicitations <strong>$user->name</strong>, ton compte a bien été validé!",
                ]);
            }
            return back()->with([
                'title' => "Oups...",
                'red' => "Désolé, il y a eu un petit problème..."
            ]);
        }
        return back()->with([
            'title' => "L'utilisateur n'existe pas!",
            'red' => "Désolé, je n'ai pas trouvé un utilisateur!"
        ]);
    }

    public function destroy() {
        $user = auth()->user();
        auth()->logout();
        return redirect()->back()
            ->with([
                'title' => "Tu es déconnecté!!",
                'violet' => "<strong>$user->name</strong>, à très bientôt!"
            ]);
    }
}
